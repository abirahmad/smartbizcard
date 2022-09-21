<!DOCTYPE html>
<html>

<head>
    <title>SmartVcard</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

    </style>
</head>

<body>
    <h3 style="text-align: center">SmartVcard</h3>
    <p>Dear User,</p>
    <p>You have been purchased plan from our services, That plan will be expired on {{$expireData['expire_date']}}</p>
</body>

</html>
