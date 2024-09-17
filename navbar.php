
<script>
    $('#menu > ul.nav-pills li').click(function(e) {
        $('.nav-pills li.active').removeClass('active');
        var $this = $(this);
        $this.addClass('active');
    });

</script>