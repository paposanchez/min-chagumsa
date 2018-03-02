<li>
        <h4>{{ $entry['name']['display'] }}</h4>
        @if ($entry['diagnoses'])
                @include('partials.diagnoses', ['entry' => $entry['diagnoses']])
        @endif

        @if (count($entry['entrys']) > 0)
        <ul>
                @each('partials.diagnosis', $entry['entrys'], 'entry', 'partials.diagnoses-empty' )
        </ul>
        @endif
</li>
