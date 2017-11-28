<footer class="footer text-right">
    &COPY; <?php echo date('Y'); ?>. All rights reserved.
</footer>

<script type="text/javascript">
function notification(){
    $.ajax({
        type: "POST",
        url: "includes/helper.php",
        data: 'action=notification',
        cache: false,
        dataType: "JSON",
        beforeSend: function() {
            $('span.tourCnt, span.shramdaanCnt, span.ideasCnt').html('<img src="./assets/images/sp-loading.gif" />');
        },
        success: function(data) {
            $('span.tourCnt').html(data.T);
            $('span.shramdaanCnt').html(data.S);
            $('span.ideasCnt').html(data.I);
            $('span.feedbackCnt').html(data.F);
            $('span.totalCnt').html(data.Tot);
        }
    });
}
</script>