Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
var vm = new Vue({
    el: '#UserList',
    data: {
        newUser:{
            id: '',
            name : '',
            email : '',
            address : ''
        },
        success: false,
        edit : false,
    },
    methods: {
        Users: function() {
            this.$http.get('api/users').then(function(data) {
                this.$set('users', data.data)
            })
        },
        showUser: function(id){
          this.$http.get('api/users/'+id).then(function(data){
              this.newUser = {id: data.data.id, name: data.data.name, email:data.data.email, address: data.data.address};
          });
          this.edit = true;
        },
        updateUser: function(id){
          var user = this.newUser;
          this.$http.patch('api/users/'+id,user);
          this.newUser = { name:'', email:'', address:''};
          this.success = true;
          self = this;
          setTimeout(function(){
              self.success = false;
          }, 4000);
          this.Users();
        },
        deleteUser: function(id){
          var confirmBox = confirm('Are you sure ?');
          if(confirmBox)
              this.$http.delete('api/users/'+id);
          this.Users();
        },
        addNewUser: function (e) {
            //e.preventDefault();//form submit
            var user = this.newUser;
            this.$http.post('api/users',user);
            this.newUser = { name:'', email:'', address:''};
            this.success = true;
            self = this;
            setTimeout(function(){
                self.success = false;
            }, 4000);
            this.Users();
        },
    },
    computed: {
        validation: function () {
            return {
                name: !!this.newUser.name.trim(),
                email: !!this.newUser.email.trim(),
                address: !!this.newUser.address.trim()
            }
        },
        isValid: function () {
            var validation = this.validation
            return Object.keys(validation).every(function (key) {
                return validation[key];
            })
        },
    },
    ready: function () {
        this.Users()
    }
});
