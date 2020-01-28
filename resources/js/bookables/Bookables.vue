<template>
    <div>
        <div v-if="loading">
            Data is loading...
        </div>
        <div v-else>
            <div class="row mb-4"
                v-for="row in rows"
                :key="'row' + row">

                <div class="col d-flex align-items-stretch"
                    v-for="(bookable, column) in bookablesInRow(row)"
                    :key="'row' + row + column">

                    <bookable-list-item
                        :id="bookable.id"
                        :title="bookable.title"
                        :description="bookable.description"
                    ></bookable-list-item>
                </div>
                <div class="col"
                    v-for="p in placeholdersInRow(row)"
                    :key="'placeholder' + row + p">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
// v-for="(bookable, index) in bookables"
// :key="index"
// ** assign array index of bookables to key **
// OR
// ** bookable objects have id assigned **
// bookables = [{id: 1, ...}];
// :key="bookable.id"
import BookableListItem from "./BookableListItem";

export default {
    components: {
        BookableListItem
        // item: BookableListItem       <item></item>
    },
    data() {
        return {
            bookables: null,
            loading: false,
            columns: 3,
        }
    },
    computed: {
        // DB query
        // stock reactive
        // computed recalculates rows() on change bookables
        rows() {
            return this.bookables === null
                ? 0
                : Math.ceil(this.bookables.length / this.columns);
        }
    },
    methods: {
        bookablesInRow(row) {
            return this.bookables.slice((row - 1) * this.columns, row * this.columns);
        },
        placeholdersInRow(row) {
            return this.columns - this.bookablesInRow(row).length;
        },
    },
    created() {
        this.loading = true;
        /*
        const p = new Promise((resolve, reject) => {
            console.log(resolve);
            console.log(reject);
            setTimeout(() => resolve("!the result"), 3000);
        })
            .then(result => "Hello again " + result)
            .then(result => console.log(result))
            .catch(result => console.log(`Error ${result}`));

        console.log(p);
        */
        // axios.get returns a Promise
        const request = axios
            .get("/api/bookables")
            .then(response => {
                this.bookables = response.data;
                this.loading = false;
            });

        console.log(request);
    }
}
</script>

<style scoped>
</style>
