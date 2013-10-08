<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
        <p>Hi {{ substr($donor->name, 0, strpos($donor->name, ' ')) }},</p>

        <p>We just received a new compatible blood demand in your region. See the details below.</p>

        <p>
            Blood group: {{ $demand->blood_type }}<br />
            Demand: {{ $demand->title }}<br />
            Description: {{ $demand->details ?: '<em>Not provided</em>'  }}
        </p>

        <p>To help you can attend to any of the locations below:</p>

        <ul>
        @foreach ($demand->locations as $location)
        <li>
            <p>
                <strong>{{ $location->name }}</strong><br />
                Address: {{ $location->address }}<br />
                Hours: {{ $location->hours }}
            </p>
        </li>
        @endforeach
        </ul>

        <p>
            Thanks,<br />
            Blood Donations Service
        </p>
	</body>
</html>