<?php

$html = "
<html>
  <head>
    <style>
      body {
        font-family: sans-serif;
        font-size: 10pt;
            color: #777;
      }
      p {
        margin: 0pt;
      }
      table.items {
    		border: 0.1mm solid #777;
		}
      td {
        	vertical-align: top;
      }
      .items td {
        	border-left: 0.1mm solid #777;
        	border-right: 0.1mm solid #777;
      }
      table thead td {
        background-color: #EEEEEE;
        text-align: center;
        font-variant: small-caps;
      }
      .items td.blanktotal {
        background-color: #EEEEEE;
        border: 0.1mm solid #777;
        background-color: #FFFFFF;
        border: 0mm none #777;
        border-top: 0.1mm solid #777;
        border-right: 0.1mm solid #777;
      }
      .items td.totals {
        text-align: left;
        border: 0.1mm solid #777;
      }
      .items td.cost {
        text-align: left;
      }
    </style>
  </head>
    <body>
    <htmlpageheader name='myheader'>
         <table width='100%'>
            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>

            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>

            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>

            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>


            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>


            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>


            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>


            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>


            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>

            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>
            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>

            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>

            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>

            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>

            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>

            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>

            <tr>
                <td width='5%' style='text-align: center; '>
                    <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>
                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                <p>
                    mPDF
Headers & Footers Method 2
Odd / Right page
Nulla felis erat, imperdiet eu, ullamcorper non, nonummy quis, elit. Suspendisse potenti. Ut a eros
at ligula vehicula pretium. Maecenas feugiat pede vel risus. Nulla et lectus. Fusce eleifend neque
sit amet erat. Integer consectetuer nulla non orci. Morbi feugiat pulvinar dolor. Cras odio. Donec
mattis, nisi id euismod auctor, neque metus pellentesque risus, at eleifend lacus sapien et risus.
Phasellus metus. Phasellus feugiat, lectus ac aliquam molestie, leo lacus tincidunt turpis, vel
aliquam quam odio et sapien. Mauris ante pede, auctor ac, suscipit quis, malesuada sed, nulla.
Integer sit amet odio sit amet lectus luctus euismod. Donec et nulla. Sed quis orci.
</p>

                </td>

                
            </tr>
            
        </table>      

        <div style='text-align: center; font-style: italic;'><a href='http://www.casuarinacatering.com/' target='_blank'>www.casuarinacatering.com</a></div>
  </body>

</html>
";



define('_MPDF_PATH','/');
include("mpdf.php");
// require('mpdf/mpdf.php');
$mpdf=new mPDF('c','A4','','',20,15,48,25,10,10); 
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Star Printing.");
$mpdf->SetAuthor("Star Printing.");
$mpdf->SetWatermarkText("Paid");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');
$mpdf->SetHTMLHeader("
	 <table width='100%'>
            <tr>
                <td width='5%' style='text-align: center; '>
                        <img src='http://www.casuarinacatering.com/img/header-logo.png'>
                    <br>

                        <span style='font-weight: bold; font-size: 12pt;'>187 Macpherson Road - Singapore 348545</span>
                    <br>
                    <span style='font-size: 10pt;'>
                       Ph: 62859001
                    </span>
                </td>

                
            </tr>
            </table>");
$mpdf->SetHTMLFooter('
<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">My document</td>
    </tr>
</table>');
$mpdf->WriteHTML($html);
$mpdf->Output(); 

// $mpdf->Output('receipt-pdf/'.$receipt_no.'.pdf','F');

?>