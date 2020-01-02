<template>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-2">
            </div>

            <div class="col-md-8 mt-4 p-4">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" v-model="contact.email" aria-describedby="emailHelp"
                           v-bind:class="{ 'alert-danger': hasError.email }">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    <small class="text-danger" v-if="errorMessage.email">{{ errorMessage.email }}</small>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3" v-model="contact.message"
                              v-bind:class="{ 'alert-danger': hasError.message }">
                    </textarea>
                    <small class="text-danger" v-if="errorMessage.message">{{ errorMessage.message }}</small>
                </div>
                <button type="submit" @click="sendEmail()" class="btn btn-primary"
                        v-bind:class="{'btn btn-success': emailSent }"
                        v-text="buttonText"
                >
                </button>
                <small class="text-danger" v-if="errorMessage.other">{{ errorMessage.other }}</small>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data () {
            return {
                contact: {
                    email: '',
                    message: ''
                },
                hasError: {
                    email : false,
                    message: false,
                    other: false
                },
                errorMessage: {
                    email: '',
                    message: '',
                    other: '',
                },
                emailSent: false,
                buttonText: 'Send'
            }
        },
        methods: {
            sendEmail: function () {
                let app = this;
                this.resetVars();
                app.buttonText = 'sending... ⌛';
                axios.post('/contact-us', this.contact)
                    .then(function (resp) {
                        app.emailSent = true;
                        app.buttonText = 'Done ✅'
                    })
                    .catch(function (error) {
                        app.buttonText = 'Send';
                        if (error.response.status === 422) {
                            let errors = error.response.data.errors;
                            Object.keys(errors).forEach(function (key) {
                                if (key) {
                                    app.hasError[key] = true;
                                    app.errorMessage[key] = errors[key].toString()
                                }
                            })
                        } else
                        {
                            app.hasError.other = true;
                            app.errorMessage.other = 'Failed to send message';
                        }
                    });
            },
            resetVars: function () {
                let app = this;
                app.hasError.message = false;
                app.hasError.email = false;
                app.hasError.other = false;
                app.errorMessage.email = '';
                app.errorMessage.message = '';
                app.errorMessage.other = '';
            }
        }
    }
</script>
