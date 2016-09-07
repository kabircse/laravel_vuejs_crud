<?php $__env->startSection('content'); ?>
    <div class="col-md-10" id="UserList" style="margin-top: 2em;">
        <div class="col-md-5">
            <ul class="alert alert-danger" v-if="!isValid">
                <li v-show="!validation.name">Name is required</li>
                <li v-show="!validation.email">Email is required</li>
                <li v-show="!validation.address">Address is required</li>
            </ul>
            <h3>Add New</h3>
            <div class="alert alert-success" transition="success" v-if="success">Added Successfully.</div>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input v-model="newUser.name" type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input v-model="newUser.email" type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <textarea v-model="newUser.address" name="address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button :disabled="!isValid" @click="addNewUser" type="submit" class="btn btn-success" v-if="!edit">Add User</button>
                    <button :disabled="!isValid" @click="updateUser(newUser.id)" type="submit" class="btn btn-success" v-if="edit">Update User</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 pull-right">
            <table class="table">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Address</th>
                    <th>Action</th>
                </thead>
                <tbody>
                     <tr v-for="user in users">
                         <td>{{ user.id }}</td>
                         <td>{{ user.name }}</td>
                         <td>{{ user.email }}</td>
                         <td>{{ user.address }}</td>
                         <td>
                           <button class="btn btn-default btn-xs" @click="showUser(user.id)">Edit</button>
                           <button class="btn btn-danger btn-xs" @click="deleteUser(user.id)">Delete</button>
                         </td>
                     </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="assets/js/script.js"></script>
    <style>
        .success-transition{
            transition: all .5s ease-in-out;
        }
        .success-enter, .success-leave{
            opacity: 0;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>