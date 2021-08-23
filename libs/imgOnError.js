export const imgErrorFallback = (e, fullName) => {
    e.target.src = `https://ui-avatars.com/api/?name=${fullName || "Profile"}&color=EF4444&background=FECACA`
}