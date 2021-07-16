<template>
    <div class="column-content">
        <draggable class="list-group" :list="cards" group="people" @change="log($event, column_id)">
            <transition-group>
                <div
                    @click="openCard(element)"
                    class="list-group-item"
                    v-for="(element, index) in cards"
                    :key="element.id+element.title"
                >
                    {{ element.title  }}
                </div>
            </transition-group>
        </draggable>
        <ShowCard @update="updateCard($event)" />
    </div>
</template>

<script>
    import draggable from "vuedraggable";
    import ShowCard from "./showCard";
    export default {
        name: "cards",
        props: {
            cards:[],
            column_id: null
        },
        data() {
            return {
                currentElement: {},
            };
        },
        components: {
            draggable,
            ShowCard
        },
        methods: {
            log: function(event, column_id) {
                let status = Object.keys(event)[0];
                if(status != "removed"){
                    let data = event[status].element;
                    data.last_column = data.column_id;
                    data.column_id = column_id;
                    data.last_status = status;
                    this.$emit('cardUpdated', data);
                }
            },
            openCard(element){
                this.currentElement = element;
                this.$modal.show('show-card-modal', {data: element});
            },
            updateCard(event) {
                this.$emit('cardUpdated', event);
            }
        }
    }
</script>

<style scoped lang="scss">

</style>
