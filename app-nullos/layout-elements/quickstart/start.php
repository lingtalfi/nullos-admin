<div class="tac bignose">
    <p>
        This page helps you configure your <b>nullos admin</b> website.<br>
        If you have a database, please fill the form below.
    </p>
    <p>
        If you don't have a database, then you are done :)<br>
        See <a target="_blank" href="https://github.com/lingtalfi/nullos-admin">nullos documentation</a> for more
        details.
    </p>
    <div>
        <?php

        use QuickForm\QuickForm;

        $form = new QuickForm();
        $form->title = "Form";
        $form->addControl('db')->type('text'); // todo: replace with select...
        $form->addControl('table')->type('text'); // todo update depending on the selected database


        $form->display();
        ?>
    </div>
</div>