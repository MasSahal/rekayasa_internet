<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Apakah Anda ingin keluar?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                <a href="../logout.php" class="btn btn-primary">Ya Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- Required Jquery -->
<script type="text/javascript" src="../assets/js/jquery/jquery.min.js "></script>
<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.min.js "></script>
<script type="text/javascript" src="../assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap/js/bootstrap.min.js "></script>
<!-- waves js -->
<script src="../assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="../assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- slimscroll js -->
<script src="../assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

<!-- menu js -->
<script src="../assets/js/pcoded.min.js"></script>
<script src="../assets/js/vertical/vertical-layout.min.js "></script>

<script type="text/javascript" src="../assets/js/script.js "></script>
<script type="text/javascript" src="../assets/DataTables/datatables.min.js"></script>

<script type="text/javascript" src="../assets/js/common-pages.js"></script>
<script>
    function bacaimg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img').removeClass('d-none');
                $('#img').attr('src', e.target.result)
                // $('#res').html('<img src="' + e.target.result + '" alt="" id="img" width="100px" class="img-fluid mt-3">')
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>