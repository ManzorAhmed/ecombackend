<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <link rel="stylesheet" href="css/bootstrap.min.css" />-->
    <link rel="stylesheet" href="css/style.css" />
<!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
    <title>Brochure 2024-2025</title>
    <style>
        body,
        html {
            position: absolute;
            left: 0;
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }

        /* .container-fluid {
            width: 100%;
            height: auto;
            padding: 5px;
            margin-top: -10px;
            margin-right: -5px;
            background-color: transparent;
            display: block;
            z-index: 0;
        } */

        .page-column {
            background-color: #f2f2f2;
            padding: 20px;
        }

        .content-title {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 800;
            color: #1b2c59;
            font-size: 28px;
            margin: 0;
        }

        .content-title-justify {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 700;
            color: #1b2c59;
            font-size: 30px;
            margin: 0;
        }

        .content-enroll {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 700;
            color: #1b2c59;
            font-size: 40px;
            text-align: center;
        }

        ul.content-text {
            font-family: inherit;
            color: #000000;
            font-size: 16px;
            padding-left: 10px;
        }
        p.content-text {
            font-family: Arial, Helvetica, sans-serif;
            color: #000000;
            font-size: 16px;
            margin: 0;
        }

        .content-text-black {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 500;
            color: #1b2c59;
            font-size: 22px;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
        }

        .content-text-orange {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 500;
            color: #f89b37;
            font-size: 22px;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
        }

        .director {
            font-family: Arial, Helvetica, sans-serif;
            color: #f70000;
            font-size: 16px;
            font-weight: 1000;
        }

        .bold {
            font-family: Arial, Helvetica, sans-serif;
            color: #000000;
            font-size: 16px;
            font-weight: 1000;
        }

        .square {
            width: 180px;
            height: 60px;
            background-color: #1b2c59;
            border-radius: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }

        .rectangle {
            width: 100%;
            height: 100px;
            background-color: #f89b37;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .text {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-align: center;
        }

        .column-container-gray {
            width: 100%;
            padding: 5px;
            background-color: #f0f0f0;
            display: block;
            z-index: 1;
            margin-top: 10px;
            padding-right: 15px;
        }
        .column-container-1 {
            width: 100%;
            font-size: 30px;
            padding: 5px;
            z-index: -1px;
            margin-top: 10px;
            position: relative;
        }

        /* Clear floats after image containers */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .row {
            display: grid;
            /* grid-template-columns: repeat(3, 1fr); */
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 40px;
            margin: 30px;
        }

        .row-image {
            /* margin-right: 10px; */
            padding-left: 90px;
        }


        /* images */

        .img-skmc{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            height:auto;
        }

        .img-tfm{
            width: 100%;
            height: auto;
        }

        .img-iiwcg{
            display: block;
            width: 90%;
            height: auto;
        }

        .img-wp{
            display: block;
            width: 150%;
            height: auto;
            margin-top: 10px;
        }

        .footer-image {
            max-width: 5%;
            height: auto;
            position: relative;
            top: -145px;
            left: 1600px;
        }

        .column-container {
            display: flex;
            justify-content: center;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: -50px;
        }

        .q-mark {
            max-width: 100%;
            height: auto;
            /* float:right; */
            position: relative;
            top: 25px;
            left: 270px;
            /* z-index: -1; */
        }
        .q-mark-flip {
            max-width: 100%;
            height: auto;
            /* float:right; */
            position: relative;
            transform: scaleX(-1);
            top: 25px;
            left: -170px;
            /* z-index: -1; */
        }
        .img-accred {
            max-width: 100%;
            height: auto;
            /* float:right; */
            position: relative;
            top: 120px;
            left: 80px;
        }
        .img-iiwcg1 {
            max-width: 60%;
            height: auto;
            /* float:right; */
            position: relative;
            top: 0px;
            left: -356px;
        }

        .column-right {
            float: left;
            width: 33.33%;
            padding: 5px;
            display: block;
            margin-left: auto;
        }

        .footer {
            text-align: center;
            background-color: #CFA27D;
            height: 165px;
        }

        .fb-icon  {
            max-width: 2%;
            height: auto;
        }

        .in-icon {
            max-width: 2%;
            height: auto;
        }

        .ab-uae {
            color: #8f1915;
            padding-top: 20px;
            font-family: sans-serif;
            font-weight: bold;
        }

        .c-right {
            color: #8f1915;
            font-family: sans-serif;
            font-weight: 700;

        }

        .line-footer {
            border-color: #ffffff;
            width: 25%;
        }

        .column-left {
            float: left;
            width: 33.33%;
            padding: 5px;
            display: block;
            margin-right: auto;
        }

        /* Media Queries */
        @media (max-width: 600px) {
            /* CSS for small mobile devices */
            /* .container-fluid {
              width: 100%;
              height: auto;
            } */

            .row {
                grid-template-columns: 1fr;
            }

            .q-mark,
            .q-mark-flip,
            .img-accred,
            .img-iiwcg1 {
                width: 60px;
            }
        }

        @media (min-width: 601px) and (max-width: 1600px) {
            /* CSS for medium-sized devices */
            /* .container-fluid {
              width: 100%;
              height: auto;
            } */

            .row {
                grid-template-columns: repeat(2, 1fr);
            }

            .q-mark,
            .q-mark-flip,
            .img-accred,
            .img-iiwcg1 {
                width: 80px;
            }
        }

        @media (min-width: 1601px) {
            /* CSS for large devices */
            /* .container-fluid {
              width: 100%;
              height: auto;
            } */

            .row {
                grid-template-columns: repeat(3, 1fr);
            }

            .q-mark,
            .q-mark-flip,
            .img-accred,
            .img-iiwcg1 {
                width: 100px;
            }
        }

         .center {
             display: flex;
             justify-content: center;
             align-items: center;
         }
             /*height: 100vh; !* Adjust the height as needed *!*/
        .button1 {
            /*background-color: #074389;*/
            color: black;
            border: 2px solid #4CAF50;
        }

        .button1:hover {
            background-color: #5233cc;
            color: white;
            border: 2px solid #5233cc;
        }
        .button {
            color: #960796;
            padding: 16px 32px;
            border: 2px solid #960796;
            background-color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }
    </style>
</head>

<body>
<!-- <div class="container-fluid"> -->
<!-- first - page -->
<div class="row">
    <!-- first column -->
    <div class="col-lg-4 col-md-6 col-sm-12 order-lg-1 order-3 page-column">
        <div class="col-12 column-container-gray">
            <span class="content-title">PARTICIPANTS WILL</span>
            <ul class="content-text">
                <li>
                    Assess and critically review wound care literature in key
                    subject areas.
                </li>
                <li>
                    Integrate wound care principles into module answers and small
                    group patient sessions (residential weekends)
                </li>
                <li>
                    Demonstrate the application of best practices by developing an
                    selective related to the learner's everyday activities presented
                    to the class.
                </li>
            </ul>
        </div>
        <div class="col-12 column-container-gray">
            <span class="content-title">WHY ATTEND THE IIWCC</span>
            <ul class="content-text">
                <li>Certificate of completion from U & T.</li>
                <li>Readings pre-selected by faculty</li>
                <li>Comprehensive therapeutic strategies</li>
                <li>Training to be an educator</li>
                <li>Small group interprofessional collaboration</li>
                <li>Hands-on patient care demonstrations</li>
                <li>Information on new products and services</li>
                <li>Connect with international key opinion leaders</li>
                <li>Networking with colleagues old and new</li>
                <li>
                    Can be used as a credit towards the MScCH Program at U of T
                    Graduate Studies
                </li>
                <li>
                    Can be used as a credit towards the MSc Program University of
                    Murdouch (free facilitation of IIWCG)
                </li>
            </ul>
        </div>
        <div class="col-12 column-container-gray">
            <span class="content-title">QUALIFICATIONS</span>
            <p class="content-text">
                Participants must have a health professional degree or provide
                proof of a minimum of five years of relevant skin and wound care
                experience.
            </p>
        </div>
        <div class="col-12 column-container-gray">
            <p class="content-title">2024-2025 IIWCC-U.A.E</p>
            <p class="content-title">PRICE LIST</p>
            <p class="content-text">
                Please note that all prices are in US Dollars
            </p><br>
            <p class="content-text">
                Industry Sponsored
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                $6000.00
            </p>
            <p class="content-text">
                Physician
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                $5800.00
            </p>
            <p class="content-text">
                Nurse & Allied Health
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                $4900.00
            </p><br>
            <p class="content-text">
                Scholarship available for Developing Countries After approval from
                IIWCG CEO.
            </p>
        </div>
    </div>
    <!-- second column -->

    <div class="col-lg-4 col-md-6 col-sm-12 order-lg-2 order-1 page-column">
        <div class="col-12 column-container">
            <div class="content-wrapper">
                <div class="image-container">
                    <img src="{{asset('frontend/Broucher/images/qmark.png')}}" class="q-mark" alt="quotation-mark">
                    <img src="{{asset('frontend/Broucher/images/qmark.png')}}" class="q-mark-flip" alt="quotation-mark">
                    <img src="{{asset('frontend/Broucher/images/CME Accrediation.png')}}" class="img-accred" alt="cme-accreditation">
                </div>
                <div class="text-container">
                    <center>
                        <h1 class="content-enroll">ENROLLMENT<br />STARTED</h1>
                        <div class="square">
                            <span class="text">12<sup>th</sup> Batch</span>
                        </div>
                        <span class="content-title">IIWCC-U.A.E 2024-2025</span>
                        <p class="content-text-black">
                            The 1<sup>st</sup> Residential Weekend
                        </p>
                        <div>
                        </div>
                        <p class="content-text-orange">
                            March 1<sup>st</sup> to 3<sup>rd</sup> 2024
                        </p>
                        <p class="content-text-black">
                            The 2<sup>nd</sup> Residential Weekend
                        </p>
                        <p class="content-text-orange">
                            March 3<sup>rd</sup> to 6<sup>th</sup> 2025
                        </p>
                        <hr />
                        <p class="content-text">
                            Registration for the International Interprofessional Wound Care
                            Course</p>
                        <p class="content-text">Group 12 Started
                        <p class="content-text">For registration please e-mail Admin:
                            <b>iiwcc.ae2@gmail.com</b></p>
                        <p class="content-text"><b>info@iiwcg.com</b> Whtsapp No: +971 50 263 6132</p>
                        <p class="content-text">For more information visit <b>www.iiwcg.com</b> for Payment check the
                            details on Registration Form</p>
                        </p>
                        <img src="{{asset('frontend/Broucher/images/SKMC.PNG')}}" class="img-skmc" alt="sheikh-khalifa-medical-city">
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- third column -->
    <div class="col-lg-4 col-md-6 col-sm-12 order-lg-3 order-2 page-column">
        <div class="column-container-1">
            <p class="content-title-justify">LIMITED ENROLLMENT FIRST</p>
            <p class="content-title-justify">COME, FIRST SERVE CAN BE</p>
            <p class="content-title-justify">ATTENDED VIRTUALLY</p>
            <div class="rectangle mt-3">
              <span class="text"
              >INTERNATIONAL INTERPROFESSIONAL <br />
                WOUND CARE COURSE (IIWCC-U.A.E)<br />Class of 2024-205</span
              >
            </div>
            <img src="{{asset('frontend/Broucher/images/TFM.PNG')}}" class="img-tfm" alt="temerty-faculty-medicine">
            <hr />
            <div class="row-image">
                <div class="column-right">
                    <img src="{{asset('frontend/Broucher/images/IIWCG.png')}}" class="img-iiwcg" alt="iiwcg">
                </div>
                <div class="column-left">
                    <img src="{{asset('frontend/Broucher/images/WP.PNG')}}" class="img-wp" alt="woundpedia">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- second page -->
<div class="row">
    <!-- first column -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="col-12 column-container-gray">
            <span class="content-title">IIWCC OVERVIEW</span>
            <p class="content-text">
                The International Interprofessional Wound Care Course (IIWCC) is
                designed for wound care specialists with some wound care education
                and experience: physicians, nurses, and other health professionals
                in the wound care field related industry.
            </p>
            <p class="content-text">
                The IIWCC is a 12-month course, offered in partnership with the
                University of Toronto. The objective is to provide a comprehensive
                educational experience for wound care specialists and to translate
                new knowledge into practice.
            </p>
            <ul class="content-text">
                <li class="content-text">Two mandatory Educational Sessions</li>
                <li class="content-text">
                    Fourteen self-study modules (9 required to complete 5 faculty
                    chosen and 4 student chosen)
                </li>
                <li class="content-text">
                    A selective related to student,s day to day activities is
                    presented to the class and faculty along with a submitted
                    written report-demonstrated translation of evidence to practice
                    setting.
                </li>
                <li class="content-text">
                    Skills Workshops including 3 virtual platform sessions with
                    faculty between educational sessions
                </li>
                <li class="content-text">
                    Virtual Skills sessions 10 hours spread between the 2
                    educational sessions for skills acquisition.
                </li>
            </ul>
            <p class="content-title">MODULES:</p>
            <p class="content-title">Faculty Chosen (F) & Students (S)</p>
            <ul class="content-text">
                <li>Education and Health Care System (F)</li>
                <li>Health Care Delivery (S)</li>
                <li>Research Design and Methodology (S)</li>
                <li>Wound Bed Preparation (F)</li>
                <li>Inflammation and Infection (S)</li>
                <li>Leg Ulcers (F)</li>
                <li>Diabetic Foot Ulcers (F)</li>
                <li>Pressure Ulcers (F)</li>
                <li>Maintenance/Non-Healing Wounds (S)</li>
                <li>Post-Surgical Wounds (S)</li>
                <li>Burns/Trauma (S)</li>
                <li>Skin and Peri-stomal /Peri-wound (S)</li>
                <li>Lymphedema (S)</li>
                <li>Acute Skin and Soft tissue Infections (S)</li>
            </ul>
        </div>
    </div>
    <!-- second column -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="col-12 column-container-gray">
            <span class="content-title">IIWCC-UAE DIRECTORS</span>
            <p class="director">Director</p>
            <p class="content-text">
                <b>R. Gary Sibbald,</b> BSc, MD, M.Ed, D.Sci (Hons), FRCPC (Med)
                (Derm), FAAD, MAPWCA, JM. Professor of Medicine and Public Health,
                UofT, Program Director Masters of Science Community Health (Wound
                Care Prevention), Dalla Lana School of Public Health, Past
                President, World Union of Wound Healing Societies.
            </p>
            <p class="director">Co-Director</p>
            <p class="content-text">
                <b>Laurie Goodman,</b> RN, BA, MHScN, IIWCC-CAN Advanced Practice
                Nurse & Wound Care Educator, President, Laurie Goodman Consulting
                Inc.
            </p>
            <p class="content-text">
                <b>Elizabeth A. Ayello,</b> PhD, RN, CWON, ETN, MAPWCA, FAAN.
                President, Ayello, Harris & Associates, Inc, Faculty, Excelsior
                College, School of Nursing, Senior Advisor, The John A. Hartiord
                Institute for Geriatric Nursing, Co- Editor in chief, Advances in
                Skin and Wound Care
            </p>
            <p class="content-text">
                <b>Hiske Smart,</b> RN, BSN, RM, MA, PG Dip(UK), IIWCC-CAN
                Clinical Nurse Specialist: Wound Care and Hyperbaric Unit,
                American Mission Hospital, Kingdom of Bahrain, Editor
                International Interprofessional Wound Care Group UAE.Sec Gen
                WUWHS, President IIWCG.
            </p>
            <p class="content-text">
                <b>Gulnaz Tariq,</b> RN, BSN, PG Dip(Pak), Msc(UK) IIWCC-IR, Director Of Education & Wound care,Global Care Hospital,UAE Ex ADON
                Sheikh Khalifa Medical City, UAE. OCM Course Director, CEO IIWCG,
                President WUWHS.
            </p>
            <p class="content-text">
                <b>Morty Eisenberg,</b> MD, MScCH, CCFP, FCFP, IIWCC-CAN Master’s
                Program Co-Director, Medical Liaison, Hospitalist and Wound
                Consultant, Educational Faculty Member, Assistant Professor in
                both Dept of Family and Community Medicine and Dalla Lana School
                of Public Health
            </p>
            <p class="content-text">
                <b>Mariam Botros,</b> D.Ch, CDE, IIWCC-CAN Executive Director
                Wounds Canada, Clinical Educator, Chiropody Coordinator, Women's
                College Wound Healing Clinic
            </p>
            <p class="content-text">
                <b>Linda Norton,</b> MScCH, PhD, IIWCC-CAN , OT Reg. (ONT) Allied
                Health Co-director and Learning and Education Manager, Motion
            </p>
            <p class="content-text">
                <b>Kimberly LeBlanc,</b> MN RN CETN(C) PhD IIWCC-CAN School of
                Nursing, Faculty of Health Sciences, Queen’s University, Adjunct
                Professor,MCIsc program, School of physical Therapy, Faculty of
                health sciences, Western University, Past President, International
                Skin Tear Advisory Panel. Canada
            </p>
            <p class="content-text">
                <b>Reneeka (Persaud) Jaimangal,</b> MD,MScCH(C ),IIWCC-CAN KOL
                Guyana Diabetes & Foot Care Project, Research Associate and
                Special Projects, TRWCH, Toronto
            </p>
        </div>
    </div>
    <!-- third column -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="col-12 column-container-gray">
            <span class="content-title">IIWCC-U.A.E FACULTY</span>
            <p class="bold">Chiropody</p>
            <p class="content-text">
                Laura Lee Kozody, B.Sc, DCh, IIWCC-CAN Richard Liu, D.Ch,
                IIWCC-CAN Sulejman Menzildzic, MD, MSc (Kin), DCh, IIWCC-CAN
                Anamelva Revoredo, B.SC, DCh, IIWCC-CAN Bharat Kotru, IIWCC AUH
            </p>
            <p class="bold">Education</p>
            <p class="content-text">
                Debra Sibbald, BScPhm, MA, PhD (+Pharmacy) Morty Eisenberg, MD,
                MScCH, CCFP, FCFP, IIWCC-CAN
            </p>
            <p class="bold">Epidemiology/Research</p>
            <p class="content-text">
                Jack Meintjes, MBChB, MMed, FCPHM (SA) Gail Woodbury, BScPT, MSc,
                PhD Ranjani Somayaji, BScPT, MD, FRCPC, IIWCC-CAN
            </p>
            <p class="bold">Family Medicine</p>
            <p class="content-text">
                Robyn Evans, MD, IIWCC-CAN Xiu Zhao, MD, IIWCC-CAN Nancy XI, MD,
                IIWCC-CAN Victoria Smart, MD, IIWCC-CAN
            </p>
            <p class="bold">Dermatology</p>
            <p class="content-text">
                Afsaneh Alavi, MD, FRCPC, IIWCC-CAN Laurie Parsons, MD, FRCPC,
                IIWCCA-CAN
            </p>
            <p class="bold">Geriatric Medicine</p>
            <p class="content-text">
                Catherine Cheung, MD, FRCPC, IIWCC-CAN Carol L. Ott, MD, FRCPC,
                IIWCC-CAN
            </p>
            <p class="bold">Hyperbarics</p>
            <p class="content-text">A. Wayne Evans, MD</p>
            <p class="bold">Infectious Disease</p>
            <p class="content-text">
                Ranjani Somayaji, BScPT, MD, FRCPC, IIWCC-CAN
            </p>
            <p class="bold">Nursing</p>
            <p class="content-text">
                Elizabeth Ayello, PhD, RN, CNS-BC MAPWCA, FAAN Hiske Smart, MA,
                RN, PG Dip (UK) IIWCC-CAN Helen Yi er, IIWCC-SA Kimberly LeBlanc,
                MN RN CETN(C) PhD IIWCC-CAN Salvacion Cruz RN,BSN, IIWCC- KSA
                Gulnaz Tariq RN, PG Dip, BSc, IIWCC-IR, MSc
            </p>
            <p class="bold">Rehabilitation</p>
            <p class="content-text">Karen Chien, MD, IIWCC-CAN</p>
            <p class="bold">Surgery</p>
            <p class="content-text">
                Johnny Lau, MD, FRCSC Brian Ostrow, MD, FRCSC Ahmed Kayssi, MD,
                FRCSC, DrPH
            </p>
        </div>
    </div>
    <div class="center">
        <a href="https://www.iiwcg.com/_files/ugd/55365a_20f8b878c6854896baf18f66068fff38.pdf">
            <button class="button button1" >Download Pdf File</button>
        </a>
    </div>
</div>
<!-- </div> -->
<footer class="footer">
    <p class="ab-uae">Abu Dhabi, United Arab Emirates  |  info@iiwcg.com  |  Tel: +971 2 622 7887</p>
    <hr class="line-footer">
    <p class="c-right">Copyright @ 2019 IIWCG  |  All Rights Reserved</p>
    <hr class="line-footer">
    <a href="https://www.facebook.com/IIWCG" target="_blank">
        <img src="{{asset('frontend/Broucher/images/facebook-icon.png')}}" class="fb-icon" alt="Facebook Icon">
    </a>
    <a href="https://www.linkedin.com/in/iiwcg-intl-interprofessional-wound-care-group/" target="_blank">
        <img src="{{asset('frontend/Broucher/images/linkedin-icon.png')}}" class="in-icon" alt="LinkedIn Icon">
    </a>
     <div class="footer-image">
      <a href="https://www.iiwcg.com/" target="_blank">
        <img src="{{asset('frontend/Broucher/images/IIWCG.png')}}" class="img-iiwcg1" alt="iiwcg">
      </a>
    </div>
</footer>
</body>
</html>
