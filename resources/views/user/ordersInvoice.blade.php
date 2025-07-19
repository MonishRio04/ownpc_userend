<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 14px;
            color: #333;
            line-height: 1.6;
        }

        .container {
            padding: 40px;
        }

        .header,
        .footer {
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        .footer {
            border-top: 1px solid #ccc;
            border-bottom: none;
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }

        h1 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 14px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        .info-section {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
        }

        .info-box {
            width: 48%;
        }

        .info-box p {
            margin: 3px 0;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 6px;
        }
    </style>
</head>

<body>
    <div class="container">


        <div class="header">
            <div style="display: flex; justify-content: space-between;">
                <h1>Invoice</h1>
                <div style="text-align: right;">
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
