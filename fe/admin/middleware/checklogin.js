export default ({ app, route, redirect }) => {
  if (!app.$cookies.get('token')) redirect('/auth/login')
}
