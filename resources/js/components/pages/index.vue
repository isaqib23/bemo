<template>
    <div>
        <div class="row">
            <button class="btn btn-primary" @click="addColumn">Add Column</button>
        </div>
        <Columns :listings="listings"></Columns>
        <AddColumn @columnAdded="addColumn($event)"/>
        <button class="btn fab-btn" @click="exportDB">Export DB</button>
    </div>
</template>

<script>
    import Columns from "./columns";
    import AddColumn from "./addColumn";

    export default {
        name: "index",
        data() {
            return {
                listings: []
            };
        },
        components: {
            Columns,
            AddColumn
        },
        methods: {
            async addColumn(params){
                this.$modal.show('column-modal');
                if(params.title) {
                    let response = await axiosRequest.post('columns.create', {title: params.title});
                    let data = response.details;
                    data.cards = [];
                    this.listings.push(data);
                    this.$modal.hide('column-modal');
                }
            },
            async exportDB(){
                let response = await axiosRequest.get('database.dump');
                window.open(response.details);
            }
        },
        async mounted() {
            let response = await axiosRequest.get('columns.all');
            this.listings = response.details;
        }
    }
</script>


