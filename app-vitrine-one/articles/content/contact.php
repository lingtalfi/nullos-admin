<?php
// contact form...

use FrontOne\FrontOneUtil;

$d = [
    'name' => '',
    'email' => '',
    'message' => '',
];
$originalD = $d;

$errors = [];
$isSuccess = false;
if (!function_exists('h')) {
    function h($m)
    {
        return htmlspecialchars($m);
    }
}

if (array_key_exists('name', $_POST)) {
    $d = array_intersect_key($_POST, $d);
    $email = $d['email'];
    if (false === strpos($email, '@')) {
        $errors[] = "The email is invalid";
    }
    if (0 === count($errors)) {
        $isSuccess = true;
        $d = $originalD;
    }
}


?><h2 class="major">Contact</h2>
<form method="post" action="">
    <?php if (count($errors) > 0): ?>
        <div class="errors">
            The form has the following errors
            <ul>
                <?php foreach ($errors as $err): ?>
                    <li><?php echo $err; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php if ($isSuccess): ?>
        <p>Thank you, we'll be in touch soon.</p>
    <?php endif; ?>
    <div class="field half first">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo h($d['name']); ?>"/>
    </div>
    <div class="field half">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?php echo h($d['email']); ?>"/>
    </div>
    <div class="field">
        <label for="message">Message</label>
        <textarea name="message" id="message" rows="4"><?php echo h($d['message']); ?></textarea>
    </div>
    <ul class="actions">
        <li><input type="submit" value="Send Message" class="special"/></li>
        <li><input type="reset" value="Reset"/></li>
    </ul>
</form>
<ul class="icons">
    <?php
    $socialLinks = FrontOneUtil::getSocialLinks();
    ?>
    <?php if (!empty($socialLinks['twitter'])): ?>
        <li><a href="<?php echo h($socialLinks['twitter']); ?>" class="icon fa-twitter"><span
                        class="label">Twitter</span></a></li>
    <?php endif; ?>
    <?php if (!empty($socialLinks['facebook'])): ?>
        <li><a href="<?php echo h($socialLinks['facebook']); ?>" class="icon fa-facebook"><span
                        class="label">Facebook</span></a></li>
    <?php endif; ?>
    <?php if (!empty($socialLinks['instagram'])): ?>
        <li><a href="<?php echo h($socialLinks['instagram']); ?>" class="icon fa-instagram"><span class="label">Instagram</span></a>
        </li>
    <?php endif; ?>
    <?php if (!empty($socialLinks['github'])): ?>
        <li><a href="<?php echo h($socialLinks['github']); ?>" class="icon fa-github"><span class="label">GitHub</span></a>
        </li>
    <?php endif; ?>
</ul>