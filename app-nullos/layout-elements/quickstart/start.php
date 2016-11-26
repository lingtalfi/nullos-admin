<?php


use QuickForm\QuickForm;
use QuickPdo\QuickPdo;
use QuickStart\QuickStartModule;


?>
<div class="tac bignose install-page">
    <h3>Welcome to the <?php echo WEBSITE_NAME; ?> install page</h3>
    <p>
        This page helps you configure your <b>nullos admin</b> website.<br>
        Please fill the form below.<br>
        For more details about the installation process, see the <a href="#">nullos documentation</a>.
    </p>
    <div>
        <?php


        if (defined('I_AM_JUST_THE_FALLBACK_INIT')):


            $form = new QuickForm();


            $form->title = "Installation form";
            $form->labels = [
                'language' => "language",
                'dbName' => 'name',
                'dbUser' => 'user',
                'dbPass' => 'password',
            ];
            $langs = [];
            $form->addFieldset('Website information', [
                'language',
                'websiteName',
            ]);
            $form->addFieldset('Database information', [
                'dbName',
                'dbUser',
                'dbPass',
            ]);
            $form->defaultValues = [
                'websiteName' => 'My Website',
                'dbUser' => 'root',
                'dbPass' => 'root',
            ];
            $entries = scandir(APP_ROOT_DIR . '/lang');
            foreach ($entries as $v) {
                if ('.' !== $v && '..' !== $v && is_dir(APP_ROOT_DIR . '/lang/' . $v)) {
                    $langs[$v] = $v;
                }
            }

            $form->addControl('language')->type('select', $langs)->addConstraint('required');
            $form->addControl('websiteName')->type('text', 'my website')->addConstraint('required');
            $form->addControl('dbName')->type('text', 'my_db')->addConstraint('required');
            $form->addControl('dbUser')->type('text')->addConstraint('required');
            $form->addControl('dbPass')->type('text')->addConstraint('required');


            $stepIsSuccess = false;


            $form->formTreatmentFunc = function (array $formattedValues, &$msg) use ($langs, &$stepIsSuccess, $form) {

                $lang = $formattedValues['language'];
                if (array_key_exists($lang, $langs)) {

                    $msg = "Nice";
                    $ret = true;
                    try {
                        $dbName = (string)$formattedValues['dbName'];
                        $dbUser = (string)$formattedValues['dbUser'];
                        $dbPass = (string)$formattedValues['dbPass'];
                        $websiteName = (string)$formattedValues['websiteName'];

                        QuickPdo::setConnection("mysql:host=localhost;dbname=$dbName", $dbUser, $dbPass, [
                            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        ]);

                        if (true === QuickStartModule::generateInitTmp([
                                'lang' => $lang,
                                'websiteName' => $websiteName,
                                'dbNameLocal' => $dbName,
                                'dbUserLocal' => $dbUser,
                                'dbPassLocal' => $dbPass,
                                'dbNameDistant' => $dbName,
                                'dbUserDistant' => $dbUser,
                                'dbPassDistant' => $dbPass,

                            ])
                        ) {
                            $msg = "Nice";
                            $stepIsSuccess = true;
                            $form->displayNothing = true;
                            return true;
                        }

                    } catch (\Exception $e) {
                        $ret = false;
                        $msg = "The database information are incorrect, please try again";
                    }
                    return $ret;

                }

                $msg = "Oops, an error occurred";
                return false;
            };


            $form->play();


            if (true === $stepIsSuccess):
                ?>
                <div class="alert alert-success flexh">
                    <span><?php echo Icons::printIcon('done', 'green', 48); ?></span>
                    <span>Congrats! The <b>init file</b> has been created</span>
                </div>
                <section>
                    <p>
                        You can stop there if you want.<br>
                        ... or would you like to continue and generate all the tables of your website (recommended)?
                    </p>
                    <a href="/quickstart?action=start">Yes</a>
                </section>
                <?php
            endif; ?>

            <?php
        else:
            ?>
            <section>
                <p>
                    Use the forms below to generate all the tables of your website.
                </p>
            </section>

            <div>
                Databases your application interacts with...
            </div>

            <?php
        endif;
        ?>
    </div>
</div>