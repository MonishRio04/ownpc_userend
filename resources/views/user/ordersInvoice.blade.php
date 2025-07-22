<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
            max-width: 100%;
        }

        .header,
        .footer {
            border-bottom: 1px solid #ccc;
            margin-bottom: 15px;
            padding-bottom: 8px;
        }

        .footer {
            border-top: 1px solid #ccc;
            border-bottom: none;
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #777;
            padding-top: 10px;
        }

        h1 {
            font-size: 18px;
            margin-bottom: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            font-size: 12px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 6px;
            text-align: center;
        }

        .info-section {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .info-box {
            width: 100%;
            margin-bottom: 15px;
        }

        .info-box p {
            margin: 2px 0;
            font-size: 11px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 13px;
        }

        @media (min-width: 768px) {
            body {
                font-size: 14px;
            }
            
            .container {
                padding: 40px;
            }
            
            h1 {
                font-size: 22px;
            }
            
            table {
                font-size: 14px;
            }
            
            th, td {
                padding: 8px;
            }
            
            .info-section {
                flex-direction: row;
                justify-content: space-between;
            }
            
            .info-box {
                width: 48%;
                margin-bottom: 0;
            }
            
            .info-box p {
                font-size: inherit;
                margin: 3px 0;
            }
            
            .section-title {
                font-size: inherit;
                margin-bottom: 6px;
            }
            
            .footer {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div style="display: flex; flex-direction: column;">
                <h1>Invoice</h1>
                <div style="text-align: left; margin-top: 10px;">
                    <p><strong>Order ID:</strong> {{ $order->id }}</p>
                    <p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>

        <div class="info-section">
            <div class="info-box">
                <p class="section-title">Billing Information</p>
                <p><strong>Name:</strong> {{ $order->name }}</p>
                <p><strong>Email:</strong> {{ $order->email }}</p>
                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                <p><strong>Address:</strong> {{ $order->address }}</p>
                <p><strong>District:</strong> {{ $order->user->district->district_name ?? 'N/A' }}</p>
                <p><strong>State:</strong> {{ $order->user->state->state_name ?? 'N/A' }}</p>
                <p><strong>Pincode:</strong> {{ $order->pincode }}</p>
            </div>

            <div class="info-box">
                <p class="section-title">Payment Details</p>
                <p><strong>Method:</strong> {{ $order->payment_method }}</p>
                <p><strong>Txn ID:</strong> {{ $order->transaction_id ?? 'N/A' }}</p>
                <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            </div>
        </div>

        <p class="section-title">Order Summary</p>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price (₹)</th>
                    <th>Total (₹)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->product->product_name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ number_format($item->price, 2) }}</td>
                        <td>{{ number_format($item->qty * $item->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>Thank you for shopping with us! For any queries, contact support@yourshop.com</p>
            <p>YourShop Pvt. Ltd. | Address Line, City, State</p>
        </div>
    </div>
</body>

</html>