<?php if (session('errorMsg')) { ?>
    <?php foreach ((session('errorMsg')) as $error) { ?>
        <div class="alert alert-warning alert-danger fade show" role="alert">
        <?= $error ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php break; ?>
    <?php } ?>
<?php } ?>

<?php if (session('successMsg')) { ?>
    <?php foreach ((session('successMsg')) as $succes) { ?>
        <div class="alert alert-success alert-succes fade show" role="alert">
        <?= $succes ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php break; ?>
    <?php } ?>
<?php } ?>