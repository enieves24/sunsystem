<?php session_start(); ?>
<?php
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Employee Dashboard</title>
  <link rel="stylesheet" href="./css/employee.css">
</head>
<body>

  <aside class="sidebar">
    <h2>Employee Panel</h2>
    <ul>
      <li onclick="showSection('ticket')">File Ticket</li>
      <li onclick="showSection('leave')">File Leave</li>
      <li><a href="logout.php" style="color:white; text-decoration:none;">Logout</a></li>
    </ul>
  </aside>

  <main class="main-content">
    
    <!-- Ticket Form -->
    <section id="ticket" class="content-section active">
  <h2>File a Support Ticket</h2>
  <form enctype="multipart/form-data">
    <label for="request_name">Name of Request:</label>
    <input type="text" id="request_name" name="request_name" required>

    <label for="approver">Approver:</label>
    <input type="text" id="approver" name="approver" required>

    <label for="name">Your Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="department">Department:</label>
    <input type="text" id="department" name="department" required>

    <label for="branch">Branch:</label>
    <input type="text" id="branch" name="branch" required>

    <label for="time_issue">Time of Issue:</label>
    <input type="time" id="time_issue" name="time_issue" required>

    <label for="date_issue">Date of Issue:</label>
    <input type="date" id="date_issue" name="date_issue" required>

    <label for="issue_type">Type of Issue:</label>
    <input type="text" id="issue_type" name="issue_type" required>

    <label for="priority">Priority Level:</label>
    <select id="priority" name="priority" required>
      <option value="Low">Low</option>
      <option value="Normal">Normal</option>
      <option value="High">High</option>
    </select>

    <label for="description">Description of Issue:</label>
    <textarea id="description" name="description" rows="4" required></textarea>

    <label>Have you tried troubleshooting?</label>
    <div>
      <input type="radio" id="troubleshooting_yes" name="troubleshooting" value="Yes" onclick="toggleTroubleshooting(true)" required>
      <label for="troubleshooting_yes">Yes</label>
      <input type="radio" id="troubleshooting_no" name="troubleshooting" value="No" onclick="toggleTroubleshooting(false)">
      <label for="troubleshooting_no">No</label>
    </div>

    <div id="troubleshooting_steps_container" style="display:none;">
      <label for="troubleshooting_steps">What troubleshooting steps were taken?</label>
      <textarea id="troubleshooting_steps" name="troubleshooting_steps" rows="3"></textarea>
    </div>

    <label for="expected_outcome">Desired Resolution / Expected Outcome:</label>
    <textarea id="expected_outcome" name="expected_outcome" rows="3"></textarea>

    <label for="notes">Additional Notes:</label>
    <textarea id="notes" name="notes" rows="2"></textarea>

    <label for="attachment">Attachment:</label>
    <input type="file" id="attachment" name="attachment">

    <button type="submit">Submit Ticket</button>
  </form>
</section>


    <!-- Leave Form -->
    <section id="leave" class="content-section">
      <h2>File a Leave Request</h2>
      <form>
        <label for="leave_type">Leave Type:</label>
        <select id="leave_type" name="leave_type" required>
          <option value="Vacation">Vacation</option>
          <option value="Sick Leave">Sick Leave</option>
          <option value="Emergency">Emergency</option>
        </select>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required>

        <label for="reason">Reason:</label>
        <textarea id="reason" name="reason" rows="4"></textarea>

        <button type="submit">Submit Leave</button>
      </form>
    </section>

  </main>

  <script src="./javascript/employee.js"></script>

</body>
</html>
