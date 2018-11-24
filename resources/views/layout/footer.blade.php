        </div>
        <!-- /.content -->
    </div>
    <!-- /.container -->
</body>
<script>
    $(document).on('click', '.delete', function (e) {
        var confirmed = confirm("Are you sure you want to delete this record ?");
        if (!confirmed) {
            return false;
        }

    });
</script>
</html>