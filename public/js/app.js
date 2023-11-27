function ToggleSidebar(){
    let sidebar = document.querySelector(".sidebar")
    sidebar.classList.toggle("close");
}

$(document).ready( function () {
    $('#myTableTraining').DataTable();
    } );

$(document).ready( function () {
    $('#myTableTesting').DataTable();
    } );