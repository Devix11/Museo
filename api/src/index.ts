import fastify from 'fastify'

const server = fastify()

server.get('/ping', async (request, reply) => {
    return 'pong\n'
})

server.get('/test', async (request, reply) => {
    reply
    .code(200)
    .header('Content-Type', 'application/json; charset=utf-8')
    .send({ hello: 'world' })
})

// IN PRODUCTION CHANGE TO 127.0.0.1
server.listen({ host: "0.0.0.0", port: 3338 }, (err, address) => {
if (err) {
    console.error(err)
    process.exit(1)
}
console.log(`Server listening at ${address}`)
})