    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Summernote JavaScript -->
    <script src="vendor/summernote/summernote.js"></script>

    <!-- Bootstrap Summernote JavaScript -->
    <script src="vendor/bootstrap-3.3.5/js/bootstrap.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();

            $editor.summernote({
                onpaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                    e.preventDefault();

                    document.execCommand('insertText', false, bufferText);
                }
            });

    </script> 



    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- JavaScript Modal's -->
    <script src="js/modal.js"></script>

</body>

</html>