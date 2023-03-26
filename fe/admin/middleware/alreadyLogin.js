export default ({ app, redirect }) => {
  if (app.$cookies.get('token')) redirect('/')
}
