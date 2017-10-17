var app = new Vue({
    el: '.container',
    methods: {

        deleteRecord: function () {

            bootbox.confirm({
                message: "Are you sure you want to delete this Record",
                callback: function (result) {
                    console.log('DELETE IT')
                    console.log(result)
                }
            });

        }

    }
});
