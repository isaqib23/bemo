<template>
    <modal name="column-modal"
           :width="300"
           :height="250"
           :adaptive="true"
           :clickToClose="false"
    >
        <div class="form-container">
            <h3>Add New Column</h3>
            <div class="field_row">
                <label for="inputTitle">Column Title</label>
                <input v-model="title" type="text" class="form-control" id="inputTitle" placeholder="Column Title">
            </div>
            <button class="btn btn-primary submit_btn" @click="saveColumn">Submit</button>
        </div>
    </modal>
</template>

<script>
    export default {
        name: "add-column",
        data() {
            return {
                title:null
            };
        },
        methods:{
            saveColumn()
            {
                if(this.title) {
                    this.$emit('columnAdded', {title: this.title});
                    this.title = null;
                }
            }
        }
    }
</script>

<style scoped lang="scss">
    .form-container {
        padding: 25px;
        .field_row {
            margin-top:25px;
        }
        .submit_btn {
            margin-top: 25px;
            width: 100%
        }
    }
</style>
