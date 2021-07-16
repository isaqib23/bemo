<template>
    <modal name="card-modal"
           :width="300"
           :height="350"
           :adaptive="true"
           :clickToClose="false"
    >
        <div class="form-container">
            <h3>Add New Card</h3>
            <div class="field_row">
                <label for="inputTitle">Card Title</label>
                <input v-model="title" type="text" class="form-control" id="inputTitle" placeholder="Column Title">
            </div>
            <div class="field_row">
                <label for="inputDescription">Card Description</label>
                <textarea v-model="description" class="form-control" id="inputDescription" placeholder="Column Description" />
            </div>
            <button class="btn btn-primary submit_btn" @click="saveCard">Submit</button>
        </div>
    </modal>
</template>

<script>
    export default {
        name: "add-card",
        data() {
            return {
                title:null,
                description:null,
            };
        },
        methods:{
            saveCard()
            {
                if(this.title && this.description) {
                    this.$emit('cardAdded', {title: this.title, description: this.description});
                    this.title = null;
                    this.description = null;
                }
            }
        }
    }
</script>

<style scoped lang="scss">

</style>
