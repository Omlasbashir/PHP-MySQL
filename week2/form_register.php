
<?php

$success = true;
$nameErr = "";
$emailErr = "";

if (isset($_POST["submit"])) {

    $success = true;

    if (empty($_POST["fullname"])) {
        $success = false;
        $nameErr = "Please enter your fullname!";
    }

    if (empty($_POST["email"])) {
        $success = false;
        $emailErr = "Please enter your email!";
    }

    if ($success) {
        echo "<div class='container mt-4'>
                <div class='alert alert-success'>
                    <h2>Student Information</h2>";

        echo "Fullname: " . htmlspecialchars($_POST["fullname"]) . "<br>";
        echo "Email: " . htmlspecialchars($_POST["email"]) . "<br>";
        echo "Place of Birth: " . htmlspecialchars($_POST["pob"]) . "<br>";

        if (isset($_POST["gender"])) {
            echo "Gender: " . htmlspecialchars($_POST["gender"]) . "<br>";
        }

        echo "Faculty: " . htmlspecialchars($_POST["faculty"]) . "<br>";

        echo "Languages: ";

        if (isset($_POST["languages"])) {
            echo htmlspecialchars(implode(", ", $_POST["languages"]));
        }

        echo "<br>";
        echo "Comment: " . htmlspecialchars($_POST["comment"]) . "<br>";

        echo "</div></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-7">

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Student Registration Form</h2>
                </div>

                <div class="card-body p-4">

                    <form method="post" action="">

                        <fieldset>

                            <legend class="text-primary mb-4">
                                Personal Information
                            </legend>

                            <!-- Fullname -->
                            <div class="mb-3">

                                <label class="form-label">Fullname</label>

                                <input type="text"
                                       name="fullname"
                                       class="form-control <?php if ($nameErr != '') echo 'is-invalid'; ?>"
                                       placeholder="Enter your fullname"
                                       value="<?php
                                       if (isset($_POST["fullname"]) && !$success)
                                           echo htmlspecialchars($_POST["fullname"]);
                                       ?>">

                                <div class="text-danger small">
                                    <?php echo $nameErr; ?>
                                </div>

                            </div>

                            <!-- Email -->
                            <div class="mb-3">

                                <label class="form-label">Email</label>

                                <input type="email"
                                       name="email"
                                       class="form-control <?php if ($emailErr != '') echo 'is-invalid'; ?>"
                                       placeholder="Enter your email"
                                       value="<?php
                                       if (isset($_POST["email"]) && !$success)
                                           echo htmlspecialchars($_POST["email"]);
                                       ?>">

                                <div class="text-danger small">
                                    <?php echo $emailErr; ?>
                                </div>

                            </div>

                            <!-- Place of Birth -->
                            <div class="mb-3">

                                <label class="form-label">Place of Birth</label>

                                <input type="text"
                                       name="pob"
                                       class="form-control"
                                       placeholder="Enter your place of birth"
                                       value="<?php
                                       if (isset($_POST["pob"]) && !$success)
                                           echo htmlspecialchars($_POST["pob"]);
                                       ?>">

                            </div>

                            <!-- Gender -->
                            <div class="mb-3">

                                <label class="form-label d-block">Gender</label>

                                <div class="form-check form-check-inline">
                                    <input type="radio"
                                           name="gender"
                                           value="male"
                                           class="form-check-input"
                                           <?php
                                           if (isset($_POST["gender"]) &&
                                               $_POST["gender"] == "male" && !$success)
                                               echo "checked";
                                           ?>>

                                    <label class="form-check-label">Male</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio"
                                           name="gender"
                                           value="female"
                                           class="form-check-input"
                                           <?php
                                           if (isset($_POST["gender"]) &&
                                               $_POST["gender"] == "female" && !$success)
                                               echo "checked";
                                           ?>>

                                    <label class="form-check-label">Female</label>
                                </div>

                            </div>

                            <!-- Faculty -->
                            <div class="mb-3">

                                <label class="form-label">Faculty</label>

                                <select name="faculty" class="form-select">

                                    <option value="computer"
                                    <?php
                                    if (isset($_POST["faculty"]) &&
                                        $_POST["faculty"] == "computer" && !$success)
                                        echo "selected";
                                    ?>>
                                        Computer and IT
                                    </option>

                                    <option value="medicine"
                                    <?php
                                    if (isset($_POST["faculty"]) &&
                                        $_POST["faculty"] == "medicine" && !$success)
                                        echo "selected";
                                    ?>>
                                        Medicine and Health Science
                                    </option>

                                    <option value="engineering"
                                    <?php
                                    if (isset($_POST["faculty"]) &&
                                        $_POST["faculty"] == "engineering" && !$success)
                                        echo "selected";
                                    ?>>
                                        Engineering
                                    </option>

                                    <option value="ecom"
                                    <?php
                                    if (isset($_POST["faculty"]) &&
                                        $_POST["faculty"] == "ecom" && !$success)
                                        echo "selected";
                                    ?>>
                                        Business
                                    </option>

                                </select>

                            </div>

                            <!-- Languages -->
                            <div class="mb-3">

                                <label class="form-label d-block">Languages</label>

                                <?php
                                $languages = ["Somali", "English", "Arabic", "Chinese"];

                                foreach ($languages as $language) {

                                    $checked = "";

                                    if (isset($_POST["languages"]) &&
                                        !$success &&
                                        in_array($language, $_POST["languages"])) {
                                        $checked = "checked";
                                    }

                                    echo "
                                    <div class='form-check form-check-inline'>
                                        <input type='checkbox'
                                               name='languages[]'
                                               value='$language'
                                               class='form-check-input'
                                               $checked>

                                        <label class='form-check-label'>
                                            $language
                                        </label>
                                    </div>";
                                }
                                ?>

                            </div>

                            <!-- Comment -->
                            <div class="mb-4">

                                <label class="form-label">Comment</label>

                                <textarea name="comment"
                                          class="form-control"
                                          rows="4"
                                          placeholder="Write your comment"><?php
                                    if (isset($_POST["comment"]) && !$success)
                                        echo htmlspecialchars($_POST["comment"]);
                                ?></textarea>

                            </div>

                            <!-- Buttons -->
                            <div class="d-grid gap-2 d-md-flex">

                                <button type="submit"
                                        name="submit"
                                        class="btn btn-primary px-4">
                                    Register
                                </button>

                                <button type="reset"
                                        class="btn btn-outline-secondary px-4">
                                    Clear
                                </button>

                            </div>

                        </fieldset>

                    </form>

                </div>

                <div class="card-footer text-center text-muted">
                    Student Registration System
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
