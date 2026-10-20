
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f0f4f8;
        }
        .registration-card {
            max-width: 1000px;
            margin: 40px auto;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
        .form-heading {
            background: #0d6efd;
            color: white;
            padding: 25px;
            text-align: center;
        }
        .section-title {
            color: #0d6efd;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 8px;
            margin: 25px 0 20px;
        }
        .required {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card shadow registration-card">
        <div class="form-heading">
            <h2>Student Registration</h2>
            <p class="mb-0">Please complete all required fields</p>
        </div>

        <div class="card-body p-4 p-md-5">
            <form action="process.php" method="POST"
                  enctype="multipart/form-data" id="studentForm">

                <h4 class="section-title">Personal Information</h4>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Full Name <span class="required">*</span></label>
                        <input type="text" name="student_name" class="form-control"
                               required pattern="[A-Za-z ]+"
                               title="Enter letters and spaces only">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Place of Birth (POB) <span class="required">*</span></label>
                        <input type="text" name="pob" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date of Birth (DOB) <span class="required">*</span></label>
                        <input type="date" name="dob" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender <span class="required">*</span></label>
                        <select name="gender" class="form-select" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <!-- <option value="Other">Other</option> -->
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Address <span class="required">*</span></label>
                        <textarea name="address" class="form-control" rows="2" required></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Telephone <span class="required">*</span></label>
                        <input type="tel" name="student_phone" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email Address <span class="required">*</span></label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Student Image <span class="required">*</span></label>
                        <input type="file" name="student_image" id="student_image"
                               class="form-control" accept=".jpg,.jpeg,.png,.gif,.webp"
                               required>
                        <div class="form-text">Allowed formats: JPG, JPEG, PNG, GIF, WEBP.</div>
                    </div>
                </div>

                <h4 class="section-title">Parent Information</h4>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Parent/Guardian Name <span class="required">*</span></label>
                        <input type="text" name="parent_name" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Parent Telephone <span class="required">*</span></label>
                        <input type="tel" name="parent_phone" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Relationship <span class="required">*</span></label>
                        <select name="relationship" class="form-select" required>
                            <option value="">Select Relationship</option>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Guardian">Guardian</option>
                            <!-- <option value="Other">Other</option> -->
                        </select>
                    </div>
                </div>

                <h4 class="section-title">Academic Information</h4>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Student ID <span class="required">*</span></label>
                        <input type="text" name="student_id" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Faculty <span class="required">*</span></label>
                        <input type="text" name="faculty" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Department <span class="required">*</span></label>
                        <input type="text" name="department" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Class <span class="required">*</span></label>
                        <input type="text" name="class_name" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Registration Date <span class="required">*</span></label>
                        <input type="date" name="registration_date"
                               class="form-control" required>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <button type="reset" class="btn btn-outline-secondary">
                        Clear Form
                    </button>
                    <button type="submit" class="btn btn-primary px-5">
                        Register Student
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
const form = document.getElementById('studentForm');

form.addEventListener('submit', function (event) {
    const fields = form.querySelectorAll(
        'input:not([type="file"]), select, textarea, input[type="file"]'
    );

    for (const field of fields) {
        if (!field.checkValidity()) {
            event.preventDefault();
            field.reportValidity();
            field.focus();
            return;
        }
    }

    const name = form.elements['student_name'];
    if (!/^[A-Za-z ]+$/.test(name.value.trim())) {
        event.preventDefault();
        name.setCustomValidity('Name must contain letters and spaces only.');
        name.reportValidity();
        name.focus();
        name.setCustomValidity('');
        return;
    }

    const file = document.getElementById('student_image');
    const allowed = /\.(jpg|jpeg|png|gif|webp)$/i;

    if (!file.files.length || !allowed.test(file.files[0].name)) {
        event.preventDefault();
        alert('Please upload a valid image: JPG, JPEG, PNG, GIF, or WEBP.');
        file.focus();
    }
});
</script>

</body>
</html>
