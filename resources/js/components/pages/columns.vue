<template>
    <div class="col-container">
        <template v-for="(list, key) in listings">
            <div class="col" :key="key">
                <div class="column-header">
                    <h5 v-text="list.title"></h5>
                    <span class="column-delete" @click="deleteCard(list)">Remove</span>
                </div>
                <Cards :cards="list.cards" :column_id="list.id" @cardUpdated="updateCard($event)"></Cards>
                <div class="column-footer">
                    <button class="badge badge-info" @click="addCard(list.id)">Add Card</button>
                </div>
            </div>
        </template>
        <AddCard @cardAdded="addCard($event)"/>
    </div>
</template>

<script>
    import Cards from "./cards";
    import AddCard from "./addCard";

    export default {
        name: "columns",
        props: {
            listings:[],
        },
        data() {
            return {
                currentColumn:null
            };
        },
        components : {
            Cards,
            AddCard
        },
        methods: {
            async addCard(result){
                if(result.title){
                    let index = this.listings.findIndex(rank => rank.id === this.currentColumn);
                    let data = {
                        title: result.title,
                        description: result.description,
                        column_id: this.currentColumn
                    }
                    let response = await axiosRequest.post('cards.create', data);
                    this.listings[index].cards.push(response.details);
                    this.currentColumn = null;
                    this.$modal.hide('card-modal');
                }else{
                    this.$modal.show('card-modal');
                    this.currentColumn = result;
                }
            },
            async deleteCard(list){
                this.listings.splice(this.listings.indexOf(list),1);
                await axiosRequest.delete('columns.delete', {id: list.id});
            },
            async updateCard(event){
                await axiosRequest.post('cards.update',event);
            }
        }
    }
</script>

<style scoped lang="scss">
    .form-control {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: inherit;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
</style>
