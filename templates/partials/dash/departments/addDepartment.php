<?php
$fieldError = $_SESSION['fieldError'] ?? null;
function displayError($error)
{
    echo "<span class='error'>* " . $error . "</span>";
}

// if theres a department error but we didn't post the form, clear the error
if ($fieldError && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['fieldError'] = null;
}
// if we have an error, remove it from the DOM after 5 seconds
if ($fieldError) {
    echo "<script>
    setTimeout(() => {
        document.querySelector('.error').remove();
    }, 5000);
    </script>";
}
?>


<section class="form">
    <h1 class="mb-5">Add a Department</h1>

    <form method="post" action="<?php echo htmlspecialchars('/lib/utils/db-mutation-handler.php');?>">
    
    <div class="mb-3">
        <label for="departmentName" class="form-label">Department Name</label>
        <input type="text" class="form-control" id="departmentName" name="departmentName">
        <?php $fieldError && displayError($fieldError)?>

    </div>
    
    <input type="submit" class="submit-btn mt-5" value="Add">
    </form>
</section>
