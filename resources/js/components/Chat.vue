<template>
    <div class="card">
        <div class="card-header msg_head">
            <div class="d-flex bd-highlight">
                <div class="img_cont">
                    <img :src="avatar()" class="rounded-circle user_img">
                    <span class="online_icon"></span>
                </div>
                <div class="user_info">
                    <span>{{ userSend.user.name }} ❤️💕😘</span>
                    <p>1767 Messages</p>
                </div>
                <div class="video_cam">
                    <span><i class="fas fa-video"></i></span>
                    <span><i class="fas fa-phone"></i></span>
                </div>
            </div>
            <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
            <div class="action_menu">
                <ul>
                    <li><i class="fas fa-user-circle"></i> View profile</li>
                    <li><i class="fas fa-users"></i> Add to close friends</li>
                    <li><i class="fas fa-plus"></i> Add to group</li>
                    <li><i class="fas fa-ban"></i> Block</li>
                </ul>
            </div>
        </div>
       <div class="card-body msg_card_body">
           <template v-for="(content, index) in contents" >
               <div v-if="content.user_id == currentUser.id" class="d-flex justify-content-end mb-4" :key="index">
                   <div class="msg_cotainer_send">
                       {{ content.message }}
                       <span class="msg_time_send">{{ time(content.created_at) }}</span>
                   </div>
                   <div class="img_cont_msg">
                       <img :src="avatar()" class="rounded-circle user_img_msg">
                   </div>
               </div>
               <div v-else class="d-flex justify-content-start mb-4" :key="index">
                   <div class="img_cont_msg">
                       <img :src="avatar()" class="rounded-circle user_img_msg">
                   </div>
                   <div class="msg_cotainer">
                       {{ content.message }}
                       <span class="msg_time">{{ time(content.created_at) }}</span>
                   </div>
               </div>
           </template>
       </div>
       <div class="card-footer">
           <div class="input-group">
               <div class="input-group-append">
                   <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
               </div>
               <textarea v-model="sms.message" class="form-control type_msg" placeholder="xxx..."></textarea>
               <div class="input-group-append"  @click="sendMessage">
                   <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
               </div>
           </div>
       </div>
    </div>
</template>

<script>
export default {
    props: {
        msg: {
            type: Array,
            default: []
        },
        currentUser: {
            type: Object,
            default: () => {}
        },
        userSend: {
            type: Object,
            default: () => {}
        }
    },
    data() {
        console.error(this.currentUser)
        console.error(this.userSend)
        return {
            contents : this.msg,
            sms : {
                user_id : this.currentUser.id,
                message : '',
                full_name : this.currentUser.name,
                channel_id : this.currentUser.channel.channel_id,
            },

        }
    },
    created() {
        window.Echo.private('chat').listen('.ChatEvent', (data) => {
            this.contents = data;
        });
        Pusher.logToConsole = true;
    },
    methods: {
        sendMessage() {
            window.axios.post('send-message', this.sms).then(res => {
                if (res.status == 200){
                    this.sms.message = '';
                }
            });
        },
        time (time) {
            let dateTime = new Date(time);
            return dateTime.toLocaleString();
        },
        avatar () {
            return 'https://video.fsgn2-4.fna.fbcdn.net/v/t1.30497-1/143086968_2856368904622192_1959732218791162458_n.png?stp=cp0_dst-png_p80x80&_nc_cat=1&ccb=1-7&_nc_sid=7206a8&_nc_ohc=8WlYdp7oaR4AX_yWdA6&_nc_ht=video.fsgn2-4.fna&oh=00_AT_ec3rOz0YMjx-xoCuCVYc-SVl6yjqBg5a-ngYGiYORMw&oe=62BE9A78';
        }
    },
}
</script>
