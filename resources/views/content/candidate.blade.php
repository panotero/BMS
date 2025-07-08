
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">Candidates</h2>
    <button
    class="load-page bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
    data-url="/candidates/create"
    data-target="#candidateFormContainer">
    + New Candidate</button>
</div>

<div class="overflow-x-auto">
    <table id="candidatesTable" class="min-w-full border text-sm text-left">
        <thead class="bg-gray-200 text-xs uppercase">
            <tr>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Preferred Location</th>
                <th class="px-4 py-2 border">Source</th>
                <th class="px-4 py-2 border">Covid Vax</th>
                <th class="px-4 py-2 border">Availability</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            {{-- Sample Data - Replace with dynamic loop --}}
            @foreach($candidates as $candidate)
            <tr>
                <td class="px-4 py-2 border">
                    {{$candidate->candidate_name}}
                </td>
                <td class="px-4 py-2 border">
                    {{$candidate->preferred_location}}</td>
                <td class="px-4 py-2 border">
                    {{$candidate->referral_source}}</td>
                <td class="px-4 py-2 border">
                    {{$candidate->covid_vaccinated}}</td>
                <td class="px-4 py-2 border">
                    {{$candidate->availability}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#candidatesTable').DataTable({
            responsive: true,
            pageLength: 10
        });
    });
</script>
<script>



    $(document).on('click', '.load-page', function () {
    let url = $(this).data('url');
    let target = $(this).data('target') || '#main-content'; // default to main-content

    $(target).html('<p class="text-gray-400">Loading...</p>');

    $.get(url, function (data) {
        $(target).html(data);
    }).fail(function () {
        $(target).html('<p class="text-red-600">Failed to load content.</p>');
    });
});

</script>
