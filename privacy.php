<?php require __DIR__.'/config/bootstrap.php'; $s=settings($pdo); $business=$s['business_name']??'Renova+'; ?><!doctype html>
<html lang="en-AU">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Privacy notice | <?=e($business)?></title><link rel="stylesheet" href="assets/css/site.css"></head>
<body>
<header class="light-header"><a class="logo" href="index.php"><span>R+</span><?=e($business)?></a><a class="phone" href="index.php">Back to site</a></header>
<main class="privacy-page">
    <div class="kicker">PRIVACY NOTICE</div>
    <h1>How we handle your enquiry.</h1>
    <p class="intro">This notice explains how <?=e($business)?> collects and uses the name, email address and phone number you submit through this website.</p>
    <h2>What we collect</h2>
    <p>We collect the details you provide, whether you are currently wanting a renovation, your consent record, and basic technical information needed to protect the form and manage an enquiry.</p>
    <h2>Why we use it</h2>
    <p>We use your information to respond to your enquiry, discuss the promotion or a potential renovation, maintain our records, and improve the website. We do not sell your personal information.</p>
    <h2>Who receives it</h2>
    <p>Your enquiry is available to <?=e($business)?> and trusted service providers needed to operate this website, such as hosting or email services. We take reasonable steps to protect it from misuse, loss and unauthorised access.</p>
    <h2>Retention and access</h2>
    <p>We keep enquiry information only as long as reasonably necessary for the purposes above or where the law requires. You can ask for access to, correction of, or deletion of your information by contacting <a href="mailto:<?=e($s['email']??'')?>"><?=e($s['email']??'')?></a>.</p>
    <h2>Contact</h2>
    <p>For privacy questions or complaints, contact us at <a href="mailto:<?=e($s['email']??'')?>"><?=e($s['email']??'')?></a>. This notice should be reviewed and updated with the client's legal entity, actual providers, retention policy and Australian Privacy Act obligations before launch.</p>
</main>
<footer><div><a class="logo" href="index.php"><span>R+</span><?=e($business)?></a><p>Renovation enquiries made simple.</p></div><div class="bottom">© <?=date('Y')?> <?=e($business)?> <a href="index.php">Home</a></div></footer>
</body></html>
