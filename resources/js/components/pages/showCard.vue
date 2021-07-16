<template>
    <modal name="show-card-modal"
           :width="300"
           height="auto"
           @before-open="beforeOpen"
           :clickToClose="false"
    >
        <div class="form-container" v-if="cardEdit">
            <h3>Update Card</h3>
            <div class="field_row">
                <label for="inputTitle">Card Title</label>
                <input v-model="data.title" type="text" class="form-control" id="inputTitle" placeholder="Column Title">
            </div>
            <div class="field_row">
                <label for="inputDescription">Card Description</label>
                <textarea v-model="data.description" class="form-control" id="inputDescription" placeholder="Column Description" />
            </div>
            <button class="btn btn-primary submit_btn" @click="updateCard">Submit</button>
        </div>
        <div v-else class="container">
            <div class="actions">
                <button class="btn btn-primary" @click="editCard">Edit</button>
                <button class="btn btn-close" @click="$modal.hide('show-card-modal')">Close</button>
            </div>
            <div class="row">
                <strong>Title:</strong>
                <p class="block">{{data.title}}</p>

                <strong>Description:</strong>
                <p class="block">{{data.description}}</p>
            </div>
        </div>
    </modal>
</template>

<script>
    export default {
        name: "show-card",
        data() {
            return {
                cardEdit: false,
                data: {}
            };
        },
        methods:{
            updateCard()
            {
                if(this.data.title && this.data.description) {
                    this.$emit('update', this.data);
                    this.cardEdit = false;
                }
            },
            editCard(){
                this.cardEdit = true;
            },
            beforeOpen (event) {
                this.data = event.params.data;
            },
        }
    }
</script>

<style scoped lang="scss">
    .container {
        padding: 25px;
        .actions {
            margin-bottom:25px;
        }
        .btn-close {
            float: right;
        }
    }
</style>
