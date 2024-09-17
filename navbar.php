<div id="menu" class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> 
    <ul class="nav nav-pills flex-column mb-auto"> 
        <li class="active"> 
            <a href="home.php" class="nav-link text-white" aria-current="page"> <i class="fa fa-home"></i><span class="ms-2">Home</span> </a> 
        </li> 
        <li>
            <a href="baptism.php" class="nav-link text-white"> <i class="fa fa-first-order"></i><span class="ms-2">Baptism</span> </a> 
        </li>
        <li>
            <a href="communion.php" class="nav-link text-white"> <i class="fa fa-first-order"></i><span class="ms-2">Communion</span> </a> 
        </li> 
        <li> 
            <a href="confirmation.php" class="nav-link text-white"> <i class="fa fa-cog"></i><span class="ms-2">Confirmation</span> </a> 
        </li> 
        <li> 
            <a href="wedding.php" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">Wedding</span> </a> 
        </li>
        <li> 
            <a href="deceased.php" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">Deceased</span> </a> 
        </li> 
        <li> 
            <a href="requests.php" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">Request</span> </a> 
        </li>
        <li> 
            <a href="user.php" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">User Lists</span> </a> 
        </li>
    </ul> <hr> 
</div>

<script>
    $('#menu > ul.nav-pills li').click(function(e) {
        $('.nav-pills li.active').removeClass('active');
        var $this = $(this);
        $this.addClass('active');
    });

</script>