# Lab Instrument Management System - Standard Operating Procedures (SOP)

## 1. User Roles and Responsibilities

### 1.1 Administrator
- **Responsibilities**:
  - Manage institute‐level settings and policies.
  - Add or remove labs within the institute.
  - Manage and register public (institute‐owned) instruments.
  - Create Principal Investigator (PI) accounts and assign them to labs.
  - Monitor system usage (via UsageLog reports) and generate overall reports.
  - Disable or enable any instrument across the system.

### 1.2 Principal Investigator (PI)
- **Responsibilities**:
  - Oversee lab operations and manage lab members (e.g., add or remove students).
  - Approve or reject instrument access requests submitted by students.
  - Manage lab‐specific (private) instruments.
  - Monitor instrument usage by lab members and review UsageLogs.
  - Add remarks and assessments (using PIRemark) after instrument use.
  - Override the booking queue in urgent situations.
  - Disable/enable lab instruments and record reasons/durations for disabling.

### 1.3 Student
- **Responsibilities**:
  - Request bookings for available instruments (whether institute/public or lab/private).
  - Adhere to booking policies and cancel within allowed timeframes.
  - Complete mandatory pre‑usage documentation (e.g., instrument condition, calibration checks).
  - Report issues immediately via the system.
  - Complete required training (recorded in TrainingRecord) before using an instrument.

---

## 2. Instrument Management Procedures

### 2.1 Adding a New Instrument
1. **Initiation**:  
   - **Administrator** registers public instruments.
   - **PI** registers lab-specific instruments.
2. **Instrument Details**:  
   - Enter basic information (name, model number, serial number, asset ID, category, manufacturer, vendor details, etc.).
   - Upload photos, operation/service manuals, and additional documents.
   - Set the instrument’s **access type** (Public or Private) along with the **owner type** (Institute or Lab) and corresponding **owner_id**.
3. **Policies & Costs**:  
   - Define the **BookingPolicy** (max booking duration in minutes, minimum time between bookings, maximum advance booking days, and whether priority override is allowed).
   - Define the **CancellationPolicy** (minimum cancellation time in hours, penalty descriptions, and whether PIs can terminate bookings early).
   - Optionally, specify per‑hour cost, and minimum/maximum booking durations.
4. **Finalization**:  
   - Submit the instrument details for registration.
   - (Optional) Link required training certifications and schedule maintenance tasks.

### 2.2 Disabling an Instrument
1. **Selection**:  
   - Administrator or PI selects the “Disable Instrument” option.
2. **Process**:  
   - Provide a detailed reason for disabling.
   - Specify a duration: either select a date range (using **disabled_until**) or mark as “Indefinitely Disabled” (by leaving **disabled_until** as NULL).
3. **System Actions**:  
   - Update the instrument’s status to “Disabled” (and record **disabled_reason** and **disabled_by**).
   - Automatically cancel any pending bookings and terminate any ongoing sessions.
   - Notify affected users and remove the instrument from available booking options.

### 2.3 Maintenance and Service Records
1. **Scheduling**:  
   - Maintenance schedules are entered into the system (with available blackout dates in the **BlackoutDate** table).
   - Recurring maintenance tasks automatically block off booking slots.
2. **Post-Maintenance**:  
   - Update the instrument’s service history.
   - Document issues found/resolved.
   - Attach any service or maintenance reports.
   - Link any involved **ServiceEngineer** records via the InstrumentServiceEngineer table.

---

## 3. Booking Procedure

### 3.1 Requesting Instrument Access
1. **Initiation**:  
   - Student logs in and views available instruments (filtered by access rules).
2. **Submission**:  
   - Select the instrument and an available time slot.
   - Submit a booking request in the **BookingRequest** table including purpose, estimated duration, and any special requirements.
   - The request is timestamped and placed into the **BookingQueue** with a default priority.

### 3.2 Queue Management
1. **Order**:  
   - Bookings are processed in a first-come, first-served manner.
   - PI override is possible for urgent research needs (if allowed by the instrument’s booking policy).
2. **Queue Statuses**:  
   - **Waiting**: Request is queued.
   - **Processing**: The instrument is in use.
   - **Cancelled**: Request was cancelled before processing.

### 3.3 Booking Approval
1. **Approval Methods**:  
   - **Automatic Approval**: For standard requests when the student meets training and policy requirements.
   - **Manual Approval**: Required if special circumstances exist (extended usage, supervision needed, etc.).
2. **Status Update**:  
   - Upon approval, the request status in **BookingRequest** is updated (e.g., to “Approved” or “In Progress”) and the corresponding queue entry is updated to “Processing.”

### 3.4 Booking Cancellation
1. **Cancellation Process**:  
   - Students can cancel via the dashboard.
   - If cancelled before the minimum cancellation time (as defined in **CancellationPolicy**), no penalty is applied.
   - If cancelled late, a penalty (as described in the policy) may be applied.
2. **System Actions**:  
   - The booking slot is released for the next queued request.
   - Notifications are sent to the affected parties.

---

## 4. Instrument Usage Workflow

### 4.1 Check-Out Procedure
1. **Before Use**:  
   - Student logs in at the scheduled time and selects “Start Session.”
   - Complete a pre-use checklist (visual inspection, upload images of the instrument’s current condition, confirm calibration, etc.).
   - The system records the **actualStartTime**.
2. **During Usage**:  
   - The student follows instrument-specific protocols.
   - Periodic status updates may be required for longer sessions.

### 4.2 Check-In Procedure
1. **After Use**:  
   - Student selects “End Session” and completes post-use documentation (upload images, usage logs, and any comments).
   - The system records the **actualEndTime**.
2. **Review Process**:  
   - The PI reviews the session details, adds any remarks (via **PIRemark**), assesses instrument condition, and can recommend maintenance if necessary.
   - The instrument’s booking history is updated and the next queued booking is processed.

---

## 5. Emergency Procedures

### 5.1 Instrument Malfunction
1. **Immediate Action**:  
   - Student stops usage and selects the “Emergency Stop” option.
   - The incident is documented (with photos and detailed descriptions).
2. **System Response**:  
   - The PI and Administrator are notified.
   - Pending bookings are canceled.
   - The instrument status is automatically updated (e.g., set to “Under Maintenance” or flagged via **PIRemark**).

### 5.2 Booking Termination
1. **PI Authority**:  
   - In case of safety or policy violations, the PI can forcibly terminate an active booking.
2. **System Actions**:  
   - Record the termination reason and update the booking status to “Terminated.”
   - Notify the student and, if applicable, apply any compensation or penalty rules.

---

## 6. Reporting and Analytics

### 6.1 Usage Reports
- **Generation**:  
  - Monthly and on-demand reports include utilization rates, average session durations, cancellation statistics, and maintenance frequency.
- **Data Source**:  
  - Reports are generated from the **UsageLog** table and aggregated booking data.

### 6.2 Student Records
- **Details Recorded**:  
  - Each student’s booking history, cancellations, training records (from **TrainingRecord**), and any policy violations.
- **Access**:  
  - Both PIs and Administrators can review these records for performance or compliance audits.

---

## 7. System Maintenance

### 7.1 Backup Procedures
- **Database Backups**:  
  - Daily backups at 2:00 AM.
  - Weekly full backups on Sundays.
  - Monthly backup verification tests.

### 7.2 Policy Updates
- **Change Management**:  
  - Policy changes (affecting booking or cancellation policies) require Administrator approval.
  - Users are notified 14 days prior to any new policy implementation.
  - Ongoing or historical bookings continue under the policy in effect at the time of booking.

---

## 8. Training Requirements

### 8.1 New User Training
- **Mandatory Training**:  
  - All new users must complete system orientation and instrument-specific training.
  - Training completions are logged in the **TrainingRecord** table.

### 8.2 Refresher Training
- **Frequency**:  
  - Annual refresher training is required.
  - Additional training is mandated after major instrument upgrades, extended absences (greater than 6 months), or after a policy violation.