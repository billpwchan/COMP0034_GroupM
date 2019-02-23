$(document).ready(function () {
    $('.minus-btn').on('click', function (e) {
        e.preventDefault();
        let $this = $(this);
        let $input = $this.closest('div').find('input');
        let value = parseInt($input.val());

        if (value > 1) {
            value = value - 1;
        } else {
            value = 0;
        }

        $input.val(value);
    });

    $('.plus-btn').on('click', function (e) {
        e.preventDefault();
        let $this = $(this);
        let $input = $this.closest('div').find('input');
        let value = parseInt($input.val());

        if (value < 100) {
            value = value + 1;
        } else {
            value = 100;
        }

        $input.val(value);
    });

    $('.like-btn').on('click', function () {
        $(this).toggleClass('is-active');
    });

    document.querySelector("#apply_voucher").addEventListener("click", function () {
        if (document.querySelector("#voucher_code").value.trim() === "") {
            showAlert("Please enter the coupon code.");
        } else {
            check_coupon();
        }
    });

    document.querySelector("#checkout").addEventListener("click", function () {
        window.location.replace("assets/controllers/checkout.php");
    });

    function check_coupon() {
        $.ajax({
            type: "POST",
            url: "assets/controllers/coupon.php",
            data: {'voucher_code': document.querySelector("#voucher_code").value, 'methodID': 1},
            success: function (data) {
                apply_coupon(data);
            }
        });
    }

    function apply_coupon(discount) {
        if (discount === 0) {
            alert("Invalid voucher");
        } else {
            alert("The discount is " + discount + "% off");
        }

    }

    function showAlert(message) {
        alert(message);
    }

    /*    var columnDefs = [
            {headerName: "Name", field: "name", checkboxSelection: true},
            {headerName: "Model", field: "model"},
            {headerName: "Price", field: "price"}
        ];

        // specify the data
        var rowData = [
            {make: "Toyota", model: "Celica", price: 35000},
            {make: "Ford", model: "Mondeo", price: 32000},
            {make: "Porsche", model: "Boxter", price: 72000}
        ];

        // let the grid know which columns and what data to use
        var gridOptions = {
            defaultColDef: {
                resizable: true
            },
            columnDefs: columnDefs,
            rowData: rowData,
            rowSelection: 'multiple'
        };

        // lookup the container we want the Grid to use
        var eGridDiv = document.querySelector('#myGrid');

        // create the grid passing in the div to use together with the columns & data we want to use
        gridObject = new agGrid.Grid(eGridDiv, gridOptions);*/

});
//
// function getSelectedRows() {
//     var selectedNodes = gridObject.api.getSelectedNodes();
//     var selectedData = selectedNodes.map(function (node) {
//         return node.data
//     });
//     var selectedDataStringPresentation = selectedData.map(function (node) {
//         return node.make + ' ' + node.model
//     }).join(', ');
//     alert('Selected nodes: ' + selectedDataStringPresentation);
// }




