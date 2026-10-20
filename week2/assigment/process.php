
<?php
session_start();

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

/* Display results after successful registration */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (($_GET['success'] ?? '') !== '1' ||
        !isset($_SESSION['student_registration'])) {
        header('Location: index.php');
        exit;
    }

    $data = $_SESSION['student_registration'];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registration Successful</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
              rel="stylesheet">
        <style>
            body { background: #f0f4f8; }
            .result-card {
                max-width: 1000px;
                margin: 40px auto;
                border: none;
                border-radius: 15px;
            }
            .result-heading {
                background: #198754;
                color: white;
                padding: 25px;
                border-radius: 15px 15px 0 0;
            }
            .student-photo {
                max-width: 160px;
                max-height: 160px;
                object-fit: cover;
                border-radius: 10px;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="card shadow result-card">
            <div class="result-heading text-center">
                <h2>Registration Successful!</h2>
                <p class="mb-0">Student information submitted successfully.</p>
            </div>

            <div class="card-body p-4">
                <h4 class="text-primary mb-3">Student Information</h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Field</th>
                                <th>Submitted Information</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $labels = [
                            'student_name' => 'Full Name',
                            'pob' => 'Place of Birth',
                            'dob' => 'Date of Birth',
                            'gender' => 'Gender',
                            'address' => 'Address',
                            'student_phone' => 'Student Telephone',
                            'email' => 'Email',
                            'parent_name' => 'Parent/Guardian Name',
                            'parent_phone' => 'Parent Telephone',
                            'relationship' => 'Relationship',
                            'student_id' => 'Student ID',
                            'faculty' => 'Faculty',
                            'department' => 'Department',
                            'class_name' => 'Class',
                            'registration_date' => 'Registration Date'
                        ];

                        foreach ($labels as $key => $label):
                        ?>
                            <tr>
                                <th><?= e($label) ?></th>
                                <td><?= e($data[$key] ?? '') ?></td>
                            </tr>
                        <?php endforeach; ?>

                            <tr>
                                <th>Student Image</th>
                                <td>
                                    <?php if (!empty($data['image'])): ?>
                                        <img
                                            src="<?= e($data['image']) ?>"
                                            alt="Student photo"
                                            class="student-photo">
                                    <?php else: ?>
                                        No image available
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex gap-2 flex-wrap mt-4">
                    <a href="index.php" class="btn btn-primary">
                        Register Another Student
                    </a>
                    <button onclick="window.print()" class="btn btn-outline-secondary">
                        Print Information
                    </button>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php
    exit;
}

/* Accept form submissions only */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

function clean($value) {
    return trim(is_string($value) ? $value : '');
}

$fields = [
    'student_name' => 'Full Name',
    'pob' => 'Place of Birth',
    'dob' => 'Date of Birth',
    'gender' => 'Gender',
    'address' => 'Address',
    'student_phone' => 'Student Telephone',
    'email' => 'Email',
    'parent_name' => 'Parent/Guardian Name',
    'parent_phone' => 'Parent Telephone',
    'relationship' => 'Relationship',
    'student_id' => 'Student ID',
    'faculty' => 'Faculty',
    'department' => 'Department',
    'class_name' => 'Class',
    'registration_date' => 'Registration Date'
];

$data = [];
$errors = [];

foreach ($fields as $key => $label) {
    $data[$key] = clean($_POST[$key] ?? '');

    if ($data[$key] === '') {
        $errors[] = "$label is required.";
    }
}

if ($data['student_name'] !== '' &&
    !preg_match('/^[A-Za-z ]+$/', $data['student_name'])) {
    $errors[] = 'Name must contain letters and spaces only.';
}

if ($data['email'] !== '' &&
    !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}

if (!in_array($data['gender'], ['Male', 'Female', 'Other'], true)) {
    $errors[] = 'Select a valid gender.';
}

if (!in_array($data['relationship'],
    ['Father', 'Mother', 'Guardian', 'Other'], true)) {
    $errors[] = 'Select a valid relationship.';
}

foreach (['dob', 'registration_date'] as $key) {
    if ($data[$key] !== '') {
        $date = DateTime::createFromFormat('!Y-m-d', $data[$key]);

        if (!$date || $date->format('Y-m-d') !== $data[$key]) {
            $errors[] = "Enter a valid {$fields[$key]}.";
        }
    }
}

/* Check the uploaded image */
$imagePath = '';
$allowedMimes = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/gif' => 'gif',
    'image/webp' => 'webp'
];

if (!isset($_FILES['student_image']) ||
    $_FILES['student_image']['error'] === UPLOAD_ERR_NO_FILE) {
    $errors[] = 'Please upload a student image.';
} elseif ($_FILES['student_image']['error'] !== UPLOAD_ERR_OK) {
    $errors[] = 'Image upload failed. Please try again.';
} else {
    $file = $_FILES['student_image'];

    if ($file['size'] > 5 * 1024 * 1024) {
        $errors[] = 'Image size must not exceed 5 MB.';
    } else {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']);

        if (!isset($allowedMimes[$mime])) {
            $errors[] = 'Upload a valid JPG, PNG, GIF, or WEBP image.';
        }
    }
}

/* Display validation errors */
if ($errors) {
    http_response_code(422);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Validation Errors</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
              rel="stylesheet">
    </head>
    <body class="bg-light">
    <div class="container py-5">
        <div class="alert alert-danger">
            <h4>Please correct these errors:</h4>
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?= e($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <a href="index.php" class="btn btn-primary">Return to Form</a>
    </div>
    </body>
    </html>
    <?php
    exit;
}

/* Save the validated image */
$uploadDir = __DIR__ . '/uploads/';

if (!is_dir($uploadDir) &&
    !mkdir($uploadDir, 0755, true) &&
    !is_dir($uploadDir)) {
    exit('Unable to create the uploads directory. Check folder permissions.');
}

$filename = bin2hex(random_bytes(16)) . '.' . $allowedMimes[$mime];

if (!move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
    exit('Unable to save the uploaded image. Please check folder permissions.');
}

$imagePath = 'uploads/' . $filename;

$data['image'] = $imagePath;
$_SESSION['student_registration'] = $data;

/* Redirect after successful registration */
header('Location: process.php?success=1');
exit;
