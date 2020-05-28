<template>
  <li class="nav-item dropdown" id="markasread">
    <a
      id="navbarDropdown"
      class="nav-link dropdown-toggle"
      href="#"
      role="button"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
      v-pre
    >
      <span class="glyphicon glyphicon-envelope"></span>Notifications
      <span class="badge badge-light">{{unreads.length}}</span>
    </a>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <li>
        <!-- <notification-item v-for="unread"></notification-item> -->
      </li>
    </ul>
  </li>
</template>

<script>
export default {
  Props: ["unreads", "userid"],
  mounted() {
    console.log("Component mounted.");
    Echo.private(`App.User.${this.userid}`).notification(notification => {
      console.log(notification);
    });
  }
};
</script>
