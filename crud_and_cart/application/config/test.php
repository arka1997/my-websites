<style type="text/css">
        .container {
            margin-top: 50px
        }

        h3.h3 {
            text-align: center;
            margin: 1em;
            text-transform: capitalize;
            font-size: 1.7em
        }

        .demo {
            padding: 45px 0
        }

        .product-grid2 {
            font-family: 'Open Sans', sans-serif;
            position: relative
        }

        .product-grid2 .product-image2 {
            overflow: hidden;
            position: relative
        }

        .product-grid2 .product-image2 a {
            display: block
        }

        .product-grid2 .product-image2 img {
            width: 100%;
            height: auto
        }

        .product-image2 .pic-1 {
            opacity: 1;
            transition: all .5s
        }

        .product-grid2:hover .product-image2 .pic-1 {
            opacity: 0
        }

        .product-image2 .pic-2 {
            width: 100%;
            height: 100%;
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            transition: all .5s
        }

        .product-grid2:hover .product-image2 .pic-2 {
            opacity: 1
        }

        .product-grid2 .social {
            padding: 0;
            margin: 0;
            position: absolute;
            bottom: 50px;
            right: 25px;
            z-index: 1
        }

        .product-grid2 .social li {
            margin: 0 0 10px;
            display: block;
            transform: translateX(100px);
            transition: all .5s
        }

        .product-grid2:hover .social li {
            transform: translateX(0)
        }

        .product-grid2:hover .social li:nth-child(2) {
            transition-delay: .15s
        }

        .product-grid2:hover .social li:nth-child(3) {
            transition-delay: .25s
        }

        .product-grid2 .social li a {
            color: #505050;
            background-color: #fff;
            font-size: 17px;
            line-height: 45px;
            text-align: center;
            height: 45px;
            width: 45px;
            border-radius: 50%;
            display: block;
            transition: all .3s ease 0s
        }

        .product-grid2 .social li a:hover {
            color: #fff;
            background-color: #3498db;
            box-shadow: 0 0 10px rgba(0, 0, 0, .5)
        }

        .product-grid2 .social li a:after,
        .product-grid2 .social li a:before {
            content: attr(data-tip);
            color: #fff;
            background-color: #000;
            font-size: 12px;
            line-height: 22px;
            border-radius: 3px;
            padding: 0 5px;
            white-space: nowrap;
            opacity: 0;
            transform: translateX(-50%);
            position: absolute;
            left: 50%;
            top: -30px
        }

        .product-grid2 .social li a:after {
            content: '';
            height: 15px;
            width: 15px;
            border-radius: 0;
            transform: translateX(-50%) rotate(45deg);
            top: -22px;
            z-index: -1
        }

        .product-grid2 .social li a:hover:after,
        .product-grid2 .social li a:hover:before {
            opacity: 1
        }

        .product-grid2 .add-to-cart {
            color: #fff;
            background-color: #404040;
            font-size: 15px;
            text-align: center;
            width: 100%;
            padding: 10px 0;
            display: block;
            position: absolute;
            left: 0;
            bottom: -100%;
            transition: all .3s
        }

        .product-grid2 .add-to-cart:hover {
            background-color: #3498db;
            text-decoration: none
        }

        .product-grid2:hover .add-to-cart {
            bottom: 0
        }

        .product-grid2 .product-new-label {
            background-color: #3498db;
            color: #fff;
            font-size: 17px;
            padding: 5px 10px;
            position: absolute;
            right: 0;
            top: 0;
            transition: all .3s
        }

        .product-grid2:hover .product-new-label {
            opacity: 0
        }

        .product-grid2 .product-content {
            padding: 20px 10px;
            text-align: center
        }

        .product-grid2 .title {
            font-size: 17px;
            margin: 0 0 7px
        }

        .product-grid2 .title a {
            color: #303030
        }

        .product-grid2 .title a:hover {
            color: #3498db
        }

        .product-grid2 .price {
            color: #303030;
            font-size: 15px
        }

        @media screen and (max-width:990px) {
            .product-grid2 {
                margin-bottom: 30px
            }
        }

        .navbar {
            padding: 25px !important;
        }
    </style>
    <style>
        body { color: #ccc }
        p {
            font-family: 'Nunito', sans-serif;
            font-size: 16px;
        color:white;
            line-height: 28px;
        }

        .animate-border {
        position: relative;
        display: block;
        width: 115px;
        height: 3px;
        background: #007bff; }

        .animate-border:after {
        position: absolute;
        content: "";
        width: 35px;
        height: 3px;
        left: 0;
        bottom: 0;
        border-left: 10px solid #fff;
        border-right: 10px solid #fff;
        -webkit-animation: animborder 2s linear infinite;
        animation: animborder 2s linear infinite; }

        @-webkit-keyframes animborder {
        0% {
            -webkit-transform: translateX(0px);
            transform: translateX(0px); }
        100% {
            -webkit-transform: translateX(113px);
            transform: translateX(113px); } }

        @keyframes animborder {
        0% {
            -webkit-transform: translateX(0px);
            transform: translateX(0px); }
        100% {
            -webkit-transform: translateX(113px);
            transform: translateX(113px); } }

        .animate-border.border-white:after {
        border-color: #fff; }

        .animate-border.border-yellow:after {
        border-color: #F5B02E; }

        .animate-border.border-orange:after {
        border-right-color: #007bff;
        border-left-color: #007bff; }

        .animate-border.border-ash:after {
        border-right-color: #EEF0EF;
        border-left-color: #EEF0EF; }

        .animate-border.border-offwhite:after {
        border-right-color: #F7F9F8;
        border-left-color: #F7F9F8; }

        /* Animated heading border */
        @keyframes primary-short {
        0% {
            width: 15%; }
        50% {
            width: 90%; }
        100% {
            width: 10%; } }

        @keyframes primary-long {
        0% {
            width: 80%; }
        50% {
            width: 0%; }
        100% {
            width: 80%; } } 

        .dk-footer {
        padding: 75px 0 0;
        background-color: #151414;
        position: relative;
        z-index: 2; }
        .dk-footer .contact-us {
            margin-top: 0;
            margin-bottom: 30px;
            padding-left: 80px; }
            .dk-footer .contact-us .contact-info {
            margin-left: 50px; }
            .dk-footer .contact-us.contact-us-last {
            margin-left: -80px; }
        .dk-footer .contact-icon i {
            font-size: 24px;
            top: -15px;
            position: relative;
            color:#007bff; }

        .dk-footer-box-info {
        position: absolute;
        top: -122px;
        background: #202020;
        padding: 40px;
        z-index: 2; }
        .dk-footer-box-info .footer-social-link h3 {
            color: #fff;
            font-size: 24px;
            margin-bottom: 25px; }
        .dk-footer-box-info .footer-social-link ul {
            list-style-type: none;
            padding: 0;
            margin: 0; }
        .dk-footer-box-info .footer-social-link li {
            display: inline-block; }
        .dk-footer-box-info .footer-social-link a i {
            display: block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            background: #000;
            margin-right: 5px;
            color: #fff; }
            .dk-footer-box-info .footer-social-link a i.fa-facebook {
            background-color: #3B5998; }
            .dk-footer-box-info .footer-social-link a i.fa-twitter {
            background-color: #55ACEE; }
            .dk-footer-box-info .footer-social-link a i.fa-google-plus {
            background-color: #DD4B39; }
            .dk-footer-box-info .footer-social-link a i.fa-linkedin {
            background-color: #0976B4; }
            .dk-footer-box-info .footer-social-link a i.fa-instagram {
            background-color: #B7242A; }

        .footer-awarad {
        margin-top: 285px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 100%;
        -moz-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center; }
        .footer-awarad p {
            color: #fff;
            font-size: 24px;
            font-weight: 700;
            margin-left: 20px;
            padding-top: 15px; }

        .footer-info-text {
        margin: 26px 0 32px; }

        .footer-left-widget {
        padding-left: 80px; }

        .footer-widget .section-heading {
        margin-bottom: 35px; }

        .footer-widget h3 {
        font-size: 24px;
        color: #fff;
        position: relative;
        margin-bottom: 15px;
        max-width: -webkit-fit-content;
        max-width: -moz-fit-content;
        max-width: fit-content; }

        .footer-widget ul {
        width: 50%;
        float: left;
        list-style: none;
        margin: 0;
        padding: 0; }

        .footer-widget li {
        margin-bottom: 18px; }

        .footer-widget p {
        margin-bottom: 27px; }

        .footer-widget a {
        color: #878787;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s; }
        .footer-widget a:hover {
            color: #007bff; }

        .footer-widget:after {
        content: "";
        display: block;
        clear: both; }

        .dk-footer-form {
        position: relative; }
        .dk-footer-form input[type=email] {
            padding: 14px 28px;
            border-radius: 50px;
            background: #2E2E2E;
            border: 1px solid #2E2E2E; }
        .dk-footer-form input::-webkit-input-placeholder, .dk-footer-form input::-moz-placeholder, .dk-footer-form input:-ms-input-placeholder, .dk-footer-form input::-ms-input-placeholder, .dk-footer-form input::-webkit-input-placeholder {
            color: #878787;
            font-size: 14px; }
        .dk-footer-form input::-webkit-input-placeholder, .dk-footer-form input::-moz-placeholder, .dk-footer-form input:-ms-input-placeholder, .dk-footer-form input::-ms-input-placeholder, .dk-footer-form input::placeholder {
            color: #878787;
            font-size: 14px; }
        .dk-footer-form button[type=submit] {
            position: absolute;
            top: 0;
            right: 0;
            padding: 12px 24px 12px 17px;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            border: 1px solid #007bff;
            background: #007bff;
            color: #fff; }
        .dk-footer-form button:hover {
            cursor: pointer; }

        /* ==========================

            Contact

        =============================*/
        .contact-us {
        position: relative;
        z-index: 2;
        margin-top: 65px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center; }

        .contact-icon {
        position: absolute; }
        .contact-icon i {
            font-size: 36px;
            top: -5px;
            position: relative;
            color: #007bff; }

        .contact-info {
        margin-left: 75px;
        color: #fff; }
        .contact-info h3 {
            font-size: 20px;
            color: #fff;
            margin-bottom: 0; }

        .copyright {
        padding: 28px 0;
        margin-top: 55px;
        background-color: #202020; }
        .copyright span,
        .copyright a {
            color: #878787;
            -webkit-transition: all 0.3s linear;
            -o-transition: all 0.3s linear;
            transition: all 0.3s linear; }
        .copyright a:hover {
            color:#007bff; }

        .copyright-menu ul {
        text-align: right;
        margin: 0; }

        .copyright-menu li {
        display: inline-block;
        padding-left: 20px; }

        .back-to-top {
        position: relative;
        z-index: 2; }
        .back-to-top .btn-dark {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            padding: 0;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #2e2e2e;
            border-color: #2e2e2e;
            display: none;
            z-index: 999;
            -webkit-transition: all 0.3s linear;
            -o-transition: all 0.3s linear;
            transition: all 0.3s linear; }
            .back-to-top .btn-dark:hover {
            cursor: pointer;
            background: #FA6742;
            border-color: #FA6742; }
    </style>

    <input type="email" name="email" class="form-control">