<script type="text/javascript">
    $("#profile").click(function(e) {
        $("#profileupload").click();
    });

    function fasterPreview(uploader) {
        if (uploader.files && uploader.files[0]) {
            $('#profile').attr('src',
                window.URL.createObjectURL(uploader.files[0]));
        }
    }

    $("#profileupload").change(function() {
        fasterPreview(this);
    });

    AOS.init();

    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
