// on button query and refresh
$('.join').on('click', function() {
    console.log("hello");
    let space = window.location.search.substr(1);
    let spaceArr = space.split("=", 2);
    let spaceId = spaceArr[1];
    // location.reload();
    $.ajax({
        method: "POST",
        url: "ajax/join_space.php",
        data: { 
            // location id nodig
            spaceId: spaceId
        },
        dataType: 'json'
    })
})