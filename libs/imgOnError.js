export const userImgFallback = (e, fullName) => {
    e.target.src = `https://ui-avatars.com/api/?name=${fullName || "Profile"}&color=EF4444&background=FECACA`
}

export const eventImgFallback = (e, name) => {
    e.target.src = `https://ui-avatars.com/api/?name=${name || "Event"}&color=a855f7&background=E9D5FF`
}