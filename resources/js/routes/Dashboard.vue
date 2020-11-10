<template>
    <div class="dashboard">

    </div>
</template>
<script>
import axios from 'axios';

export default {
    mounted() {
        console.log(`Mounted ${this.$route.name}`);

        axios.post('/api/payload', {
            "name": "Jimmy Joe",
            "phone": "07707000001",
            "email": "jim@collier.com",
            "query_type": {
                "id": 5678,
                "title": "DECLINED OFFER"
            },
            "call_stats": {
                "id": 1213,
                "length": "00:56:43",
                "recording_url": "http://remote.system/recording/1213"
            },
            "campaign": {
                "id": 1514,
                "name": "Campaign B",
                "description": "A different campaign not for Michael"
            }
        })
        .then(response => {
            console.log(response.data);
        })
        .catch(error => {
            console.error(error);
        });
    }
}
</script>
