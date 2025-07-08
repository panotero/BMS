
<h2 class="text-2xl font-bold mb-6">New Candidate</h2>

<form method="POST" id="candidateForm" class="bg-white border p-4 rounded shadow w-full max-w-3xl text-sm">
    @csrf

    <div class="grid grid-cols-1 gap-y-2">
        {{-- CANDIDATE NAME --}}
        <div class="grid grid-cols-3 gap-2 items-center">
            <label class="text-gray-700 font-medium">Candidate Name</label>
            <input type="text" name="candidate_name" class="col-span-2 border rounded px-3 py-1.5" required>
        </div>

        {{-- YES/NO FIELDS (Ordered) --}}
        @foreach ([
            'dementia_experience' => 'Dementia Experience',
            'hospice_experience' => 'Hospice Experience',
            'bedbound_experience' => 'Bedbound',
            'incontinence_experience' => 'Incontinence Experience',
            'auto_insurance' => 'Auto Insurance',
            'drivers_license' => "Driver's License",
            'okay_transport' => 'Okay Transport',
            'okay_with_gender' => 'Okay with Male/Female',
            'okay_with_smokers' => 'Okay with Smokers',
            'okay_with_pets' => 'Okay with Pets',
            'slide_board' => 'Slide Board',
            'gait_belt_experience' => 'Gait Belt Experience',
            'hoyer_lift_experience' => 'Hoyer Lift Experience',
        ] as $name => $label)
            <div class="grid grid-cols-3 gap-2 items-center">
                <label class="text-gray-700">{{ $label }}</label>
                <select name="{{ $name }}" class="col-span-2 border rounded px-3 py-1.5">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
        @endforeach

        {{-- TEXT FIELDS (Continued Order) --}}
        <div class="grid grid-cols-3 gap-2 items-center">
            <label class="text-gray-700">Preferred Location</label>
            <input type="text" name="preferred_location" class="col-span-2 border rounded px-3 py-1.5">
        </div>

        <div class="grid grid-cols-3 gap-2 items-center">
            <label class="text-gray-700">How did you know about our opening?</label>
            <input type="text" name="referral_source" class="col-span-2 border rounded px-3 py-1.5">
        </div>

        <div class="grid grid-cols-3 gap-2 items-center">
            <label class="text-gray-700">Couples Care</label>
            <select name="couples_care" class="col-span-2 border rounded px-3 py-1.5">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="grid grid-cols-3 gap-2 items-center">
            <label class="text-gray-700">Salary</label>
            <input type="text" name="salary" class="col-span-2 border rounded px-3 py-1.5">
        </div>

        <div class="grid grid-cols-3 gap-2 items-center">
            <label class="text-gray-700">Meal Prep</label>
            <select name="meal_prep" class="col-span-2 border rounded px-3 py-1.5">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="grid grid-cols-3 gap-2 items-center">
            <label class="text-gray-700">Covid Vaccinated</label>
            <select name="covid_vaccinated" class="col-span-2 border rounded px-3 py-1.5">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="grid grid-cols-3 gap-2 items-center">
            <label class="text-gray-700">Certificates (Companion, CNA, HHA)</label>
            <input type="text" name="certificates" class="col-span-2 border rounded px-3 py-1.5">
        </div>

        <div class="grid grid-cols-3 gap-2 items-center">
            <label class="text-gray-700">Interested to get PCA Certified?</label>
            <select name="interested_pca_certification" class="col-span-2 border rounded px-3 py-1.5">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="grid grid-cols-3 gap-2 items-center">
            <label class="text-gray-700">Earliest & Latest Availability</label>
            <input type="text" name="availability" class="col-span-2 border rounded px-3 py-1.5">
        </div>

        {{-- TEXTAREAS --}}
        <div class="grid grid-cols-3 gap-2 items-start">
            <label class="text-gray-700 pt-1">Background Disclosure</label>
            <textarea name="background_disclosure" rows="2" class="col-span-2 border rounded px-3 py-1.5"></textarea>
        </div>

        <div class="grid grid-cols-3 gap-2 items-start">
            <label class="text-gray-700 pt-1">Others</label>
            <textarea name="others" rows="2" class="col-span-2 border rounded px-3 py-1.5"></textarea>
        </div>
    </div>

    {{-- Submit --}}
    <div class="mt-4 text-right">
        <button type="submit" class="bg-green-600 text-white px-5 py-1.5 rounded hover:bg-green-700 text-sm">
            Submit Candidate
        </button>
    </div>
</form>

<script>
document.getElementById('candidateForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    fetch('{{ route('candidates.store') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(res => {
        const contentType = res.headers.get("content-type") || "";
        if (contentType.includes("application/json")) {
            return res.json();
        } else {
            return res.text().then(html => {
                console.error("Server responded with HTML (not JSON):");
                console.log(html); // Or show in a modal for better UI
                throw new Error("Expected JSON but got HTML");
            });
        }
    })
    .then(data => {
        if (data.status === 'success') {
            alert(data.message);
            $('.load-page[data-url="' + data.redirect + '"]').trigger('click');
        } else {
            alert("Something went wrong.");
        }
    })
    .catch(err => {
        console.error("Submission failed:", err);
    });
});
</script>

