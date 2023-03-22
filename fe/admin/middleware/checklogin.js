export default ({ app, route, redirect }) => {
  const cookieRes = app.$cookies.get('token')
  if (!cookieRes) {
    redirect('/auth/login')
  }
}
