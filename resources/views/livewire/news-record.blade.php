<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold">{{ $news->title }}</h1>
    <p class="text-gray-500">{{ $news->source->name }} - {{ $news->created_at->format('Y-m-d') }}</p>

    <!-- تصویر خبر -->
    <img src="{{ $news->image_url }}" class="w-full h-64 object-cover my-4 rounded-lg shadow-md" alt="تصویر خبر">

    <!-- لینک اصلی خبر -->
    <a href="{{ $news->original_link }}" target="_blank" class="text-blue-600 underline block mb-4">
        مشاهده خبر در منبع اصلی
    </a>

    <div class="bg-gray-100 p-4 rounded-lg">
        <p>{{ $news->content }}</p>
    </div>

    <!-- ضبط صدا -->
    <div class="mt-4">
        <button onclick="startRecording()" class="bg-red-500 text-white p-2 rounded">شروع ضبط</button>
        <button onclick="stopRecording()" class="bg-green-500 text-white p-2 rounded" disabled id="stopBtn">پایان ضبط</button>
        <audio id="audioPlayback" controls class="w-full mt-2"></audio>
        <button onclick="uploadRecording()" class="bg-blue-500 text-white p-2 rounded mt-2" disabled id="saveBtn">ذخیره</button>
    </div>

    <script>
        let mediaRecorder;
        let audioChunks = [];
        let recordedBlob;

        async function startRecording() {
            let stream = await navigator.mediaDevices.getUserMedia({ audio: true });
            mediaRecorder = new MediaRecorder(stream);

            mediaRecorder.ondataavailable = (event) => {
                audioChunks.push(event.data);
            };

            mediaRecorder.onstop = () => {
                recordedBlob = new Blob(audioChunks, { type: 'audio/wav' });
                let audioUrl = URL.createObjectURL(recordedBlob);
                document.getElementById('audioPlayback').src = audioUrl;
                document.getElementById('saveBtn').disabled = false;
            };

            mediaRecorder.start();
            document.getElementById('stopBtn').disabled = false;
        }

        function stopRecording() {
            mediaRecorder.stop();
            document.getElementById('stopBtn').disabled = true;
        }

        function uploadRecording() {
            let formData = new FormData();
            formData.append('audio', recordedBlob, 'recorded_audio.wav');
            formData.append('_token', '{{ csrf_token() }}');

            fetch("{{ route('news.record.save', $news->id) }}", {
                method: 'POST',
                body: formData
            }).then(response => response.json())
                .then(data => alert(data.message))
                .catch(error => console.error('خطا:', error));
        }
    </script>
</div>
