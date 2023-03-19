<template>
    <div class="container">
        <div class="content">
            <div class="right-side" v-if="sent === false">
                <div class="topic-text">Оставьте заявку</div>
                <p style="color: red" v-show="errorMessages.length"><b>{{errorMessages}}</b></p>
                <form>
                    <div class="input-box">
                        <input type="text" placeholder="Ваше имя" v-model="form.name"/>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Введите телефон" v-model="form.phone"/>
                    </div>
                    <div class="input-box message-box">
                        <textarea placeholder="Сообщение" v-model="form.text"></textarea>
                    </div>
                    <div class="button">
                        <input type="button" value="Отправить" @click="sendFeedback"/>
                    </div>
                </form>
            </div>
            <div class="right-side" v-else>
                <div class="topic-text" style="text-align: center">Заявка успешно отправлена</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "feedback-index",
    data() {
        return {
            form: {
                name: '',
                phone: '',
                text: '',
            },
            sent: false,
            errorMessages: '',
        }
    },
    methods: {
        async sendFeedback() {
            try {
                const response = await axios.post('/api/send', this.form);
                if (response.data.message === 'Заявка успешно отправлена') {
                    this.sent = true
                }
            } catch (e) {
                if (e.response.status === 422){
                    for (const key in e.response.data.errors){
                        this.errorMessages += e.response.data.errors[key][0] + ' ';
                    }
                }
            }
        }
    }
}
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

*,
*::after,
*::before {
    box-sizing: inherit;
}

input,
textarea {
    box-sizing: border-box;
}

body {
    font-family: "Roboto", sans-serif;
    font-size: 16px;
    line-height: 1.2;
    width: 100%;
    min-height: 100vh;
    background: linear-gradient(45deg, #fff1eb, #ace0f9);
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
}

.content {

    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
    padding: 40px;
    border-radius: 5px;
    box-shadow: 4px 4px 8px 0 rgba(34, 60, 80, 0.2);
    margin: 0 auto;
}


.right-side {
    width: 75%;
    margin-left: 75px;
}

.details i {
    font-size: 25px;
    color: #3e2093;
    margin-bottom: 10px;
}

.topic-text {
    font-size: 23px;
    font-weight: 600;
    color: #3e2093;
    margin-bottom: 10px;
}

.right-side p {
    margin-bottom: 20px;
}

.input-box {
    height: 50px;
    width: 100%;
    margin-bottom: 20px;
}

.input-box input,
.input-box textarea {
    height: 100%;
    width: 100%;
    border: none;
    border-radius: 5px;
    background: #f0f1f8;
    padding: 0 20px;
}

.input-box textarea {
    resize: none;
    padding: 20px;
    font-family: "Roboto", sans-serif;
}

.message-box {
    min-height: 110px;
}

.button {
    display: inline-block;
}

.button input[type="button"] {
    color: #fff;
    font-size: 18px;
    background: #3e2093;
    outline: none;
    border: none;
    padding: 10px 20px;
    border-radius: 7px;
    transition: 0.2s;
}

.button input[type="button"]:hover {
    background: rgb(0, 0, 207);
}
</style>
