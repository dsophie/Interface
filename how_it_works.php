<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style_responsive.css">
        <link rel="stylesheet" href="style_struc.css">
        <link rel="stylesheet" href="style_forms.css">
        <title> How it Works | Let'sVolunteer </title>
    </head>
    <body>

        <!-- Include header structure -->
        <?php include("elements_struc/header.php"); ?>

        <div class="block" id="main">

            <h1 class="title_home"> How it works </h1>

            <h2 class="subtitle_home"> >> Volunteering made easy! </h2>

            <p>  Once you're registered and logged in, you'll have access to your dashboard. 
                You'll find on it: </p>
            <ul>
                <li> Your parameters: manage your personal settings, your reminders and favorites</li>
                <li> A list of volunteering offers, <emp> personnalised based on your preferences </emp> so you don't waste time browsing through hundreads of offers: you can choose to learn more to see a full description of the offer or directly sign up </li>
                <li> A list of the organisations you follow: you can quickly access to the most recent offers proposed by the organisations you're interested in</li>
                <li> Your schedule: with a quick view of your upcoming activities and a link to access the main Schedule manager</li>
            </ul>

            <h2 class="subtitle_home"> >> 100% Personnalised guaranteed! </h2>

            <p> The offers you see on your dashboard are personnalised, meaning they are tailored based on what you want to do in volunteering. During the registration process, you will have to answer some questions about your volunteering preferences so we know what you want to do.</p>

            <p> Don't worry, you will still be able to access our entire database of offers if you want to have a look at all the range of volunteering activities.</p>

            <h2 class="subtitle_home"> >> How we work with organisations </h2>

            <p> Our system is based on the idea that you can do everything on it, without having to naviguate between organisations' websites. However, we know security and being sure of what you're signing for is important, so each offer comes with a link to the organisations'website. We asked organisations that sign up for our system to display a <em> certificate of authenticity </em> on their website, so you know it's not a scam.</p>

            <p> Every offer page will provide a link to access the certificate on the organisation's website so you can ensure of the authenticity of the offer. We value our users, volunteers and organisations, and so want to ensure that everyone is on the same page. Every offer page will provide a link to access the certificate on the organisation's website so you can ensure of the authenticity of the offer.</p>

            <p> Moreover, once you signed up for an offer, you will receive a confirmation email from the organisation once they confirmed your submission.  You will be able to see the activity in your schedule on your dashboard but have to receive the confirmation email to be properly signed up on the organisation's side</p>

            <h2 class="subtitle_home"> >> Ready to start your volunteering adventure? </h2>

            <div class="button_home">
                <a href="register.php"> Register </a>

            </div>


        </div>

        <!-- Include footer structure -->
        <?php include("elements_struc/footer.php"); ?>

    </body>
</html>